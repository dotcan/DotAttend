<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Card;
use App\Models\ClassSchedule;
use App\Models\RfidScanner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Attendance::latest()->paginate($request->input('limit') ?? 30);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rfid_scanner' => ['required', 'numeric'],
            'rfid_tag' => ['required', 'string'],
        ]);

        $scanner_id = $request->input('rfid_scanner');
        $rfid_tag = $request->input('rfid_tag');

        $scanner = RfidScanner::findOrFail($scanner_id);
        $card = Card::with('user.enrollments')->where('rfid_tag', $rfid_tag)->firstOrFail();
        $user = $card->user;

        $now = now();
        $schedule = ClassSchedule::whereLocation($scanner->location)
            ->where('days', 'LIKE', '%' . $now->englishDayOfWeek . '%')
            ->where('start_time', '<=', $now->toTimeString())
            ->where('end_time', '>=', $now->toTimeString())
            ->whereHas('course_class', function (Builder $q) use ($now) {
                $q->where('start_date', '<=', $now->toDateString())
                    ->where('end_date', '>=', $now->toDateString());
            })
            ->firstOrFail();

        if (!$user->enrollments->contains('class_schedule_id', $schedule->id))
            return ["message" => "User is not enrolled in schedule {$schedule->id} ({$schedule->course_class->course->crn})"];

        if ($schedule->conductedClasses->isEmpty())
            $this->newConductedClass($schedule);
        else {
            $conduct = $schedule->conductedClasses->sortByDesc('created_at')->first();
            if ($conduct->created_at->isToday()) {
                if ($conduct->is_done)
                    return ["message" => "Class is done, not accepting new attendances."];
            } else
                $this->newConductedClass($schedule);
        }

        if (($att = $user->attendances->sortByDesc('created_at')->where('class_schedule_id', $schedule->id)->first())
            && $att->created_at->isToday())
            return ["message" => "User already attended this class"];

        $att = $user->attendances()->create([
            'class_schedule_id' => $schedule->id,
            'enrollment_id' => $user->enrollments->where('class_schedule_id', $schedule->id)->first()->id,
            'absence_id' => null,
        ]);

        return [
            "message" => "Marked user attendance.",
            "data" => [
                "attendance" => $att,
                "user" => $user->only(['id', 'name', 'type']),
                "course" => $schedule->course_class->course->only(['name', 'crn'])
            ]
        ];
    }

    private function newConductedClass(&$schedule)
    {
        $schedule->conductedClasses->add($schedule->conductedClasses()->create());
    }
}

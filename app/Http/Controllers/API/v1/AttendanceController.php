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
            'esp_only' => ['nullable', 'boolean'],
        ]);

        $esp = $request->input('esp_only');

        $scanner_id = $request->input('rfid_scanner');
        $rfid_tag = $request->input('rfid_tag');

        $scanner = RfidScanner::findOrFail($scanner_id);
        if (!$scanner->is_marking_attendance)
            return ["message" => "Scanner is not marking attendance."];

        $card = Card::with('user.enrollments')->where('rfid_tag', $rfid_tag)->firstOrFail();
        $user = $card->user;
        if (!$user)
            return ["message" => $esp ? "Your card is not registered." : "Card does not belong to any user"];

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
            return ["message" => ($esp ? "You're" : "User is") . " not enrolled in schedule {$schedule->id} ({$schedule->course_class->course->crn})"];

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
            return ["message" => $esp ? "You've already marked your attendance,\r\n $user->name" : "User already attended this class"];

        $att = $user->attendances()->create([
            'class_schedule_id' => $schedule->id,
            'enrollment_id' => $user->enrollments->where('class_schedule_id', $schedule->id)->first()->id,
            'absence_id' => null,
        ]);

        $course = $schedule->course_class->course;
        if ($esp)
            $response = [
                "message" => "Marked $user->short_last_name ($user->id) attendance for $course->crn $course->name",
                "code" => 0xA
            ];
        else
            $response = [
                "message" => "Marked user attendance.",
                "data" => [
                    "attendance" => $att,
                    "user" => $user->only(['id', 'name', 'type']),
                    "course" => $course->only(['name', 'crn'])
                ]
            ];

        return $response;
    }

    private function newConductedClass(&$schedule)
    {
        $schedule->conductedClasses->add($schedule->conductedClasses()->create());
    }
}

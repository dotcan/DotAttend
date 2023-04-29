<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\CourseClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('class'))
            $schedules = ClassSchedule::whereCourseClassId($request->input('class'))
                ->latest()->simplePaginate(10);
        else
            $schedules = ClassSchedule::latest()->simplePaginate(10);
        $schedules->loadMissing('course_class.course');
        return view('admin.class-schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(['class' => ['required', 'numeric']]);
        $class = CourseClass::findOrFail($request->input('class'));
        return view('admin.class-schedules.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_class_id' => ['required', 'numeric', 'exists:' . CourseClass::class . ',id'],
            'location' => ['required', 'string'],
            'days' => ['required', 'array'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
        ]);

        $st = Carbon::createFromFormat('H:i', $request->input('start_time'));
        $et = Carbon::createFromFormat('H:i', $request->input('end_time'))->addSeconds(59);

        $schedule = ClassSchedule::create([
            'course_class_id' => $request->input('course_class_id'),
            'location' => $request->input('location'),
            'days' => $request->input('days'),
            'start_time' => $st->toTimeString(),
            'end_time' => $et->toTimeString(),
        ]);
        return redirect()->route('admin.schedules.show', $schedule);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassSchedule $schedule)
    {
        if (str(\Route::currentRouteName())->startsWith('admin')) {
            $schedule->loadMissing(['course_class.course']);
            return view('admin.class-schedules.show', compact('schedule'));
        } else {
            $schedule->loadMissing(['enrollments' => function ($q) {
                $q->where('user_id', auth()->user()->id);
            }, 'enrollments.attendances' => function ($q) {
                $q->where('user_id', auth()->user()->id);
            }]);

            return view('class-schedules.show', compact('schedule'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassSchedule $schedule)
    {
        return view('admin.class-schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSchedule $schedule)
    {
        $request->validate([
            'location' => ['required', 'string'],
            'days' => ['required', 'array'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
        ]);

        $st = Carbon::createFromFormat('H:i', $request->input('start_time'));
        $et = Carbon::createFromFormat('H:i', $request->input('end_time'))->addSeconds(59);

        $schedule->update([
            'location' => $request->input('location'),
            'days' => $request->input('days'),
            'start_time' => $st->toTimeString(),
            'end_time' => $et->toTimeString(),
        ]);
        return redirect()->route('admin.schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index');
    }
}

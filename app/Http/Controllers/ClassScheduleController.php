<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\Course;
use App\Models\CourseClass;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course, CourseClass $class)
    {
        //
    }

    public function indexo()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassSchedule $schedule)
    {
        $schedule->loadMissing(['enrollments' => function ($q) {
            $q->where('user_id', auth()->user()->id);
        }, 'enrollments.attendances' => function ($q) {
            $q->where('user_id', auth()->user()->id);
        }]);

        return view('class-schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassSchedule $classSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSchedule $classSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $classSchedule)
    {
        //
    }
}

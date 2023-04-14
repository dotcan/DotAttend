<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $course->loadMissing('courseClasses');
        $classes = $course->courseClasses()->simplePaginate(10);
        return view('admin.course-classes.index', compact('course', 'classes'));
    }

    public function indexo()
    {
        $classes = CourseClass::latest()->simplePaginate(10);
        return view('admin.course-classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.course-classes.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, CourseClass $class)
    {
        if ($class->course_id != $course->id)
            abort(404);

        $class->loadMissing('classSchedules');
        return view('admin.course-classes.show', compact('course', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseClass $courseClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseClass $courseClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseClass $courseClass)
    {
        //
    }
}

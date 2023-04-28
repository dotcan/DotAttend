<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use Illuminate\Http\Request;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('course'))
            $classes = CourseClass::whereCourseId($request->input('course'))->latest()->simplePaginate(10);
        else
            $classes = CourseClass::latest()->simplePaginate(10);
        return view('admin.course-classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(['course' => ['required', 'numeric']]);
        $course = Course::findOrFail($request->input('course'));
        return view('admin.course-classes.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => ['required', 'numeric', 'exists:' . Course::class . ',id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $class = CourseClass::create($request->input());
        return redirect()->route('admin.classes.show', $class);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseClass $class)
    {
        $class->loadMissing(['course', 'classSchedules']);
        return view('admin.course-classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseClass $class)
    {
        return view('admin.course-classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseClass $class)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $class->update($request->input());
        return redirect()->route('admin.classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseClass $class)
    {
        $class->delete();
        return redirect()->route('admin.classes.index');
    }
}

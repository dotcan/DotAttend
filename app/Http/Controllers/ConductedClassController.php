<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\ConductedClass;
use App\Models\Course;
use App\Models\CourseClass;
use Illuminate\Http\Request;

class ConductedClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course, CourseClass $class, ClassSchedule $schedule)
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
    public function show(ConductedClass $conductedClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConductedClass $conductedClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConductedClass $conductedClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConductedClass $conductedClass)
    {
        //
    }
}

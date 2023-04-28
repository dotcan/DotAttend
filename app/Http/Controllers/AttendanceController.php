<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (str(\Route::currentRouteName())->startsWith('admin')) {
            $limit = $request->input('limit') ?? 25;
            $attendances = Attendance::with(['user', 'absence', 'class_schedule.course_class.course'])->latest()->paginate($limit);
            return view('admin.attendances.index', compact('attendances'));
        } else {
            $enrollments = auth()->user()->enrollments()->with(['class_schedule.conductedClasses', 'attendances'])->get();
            return view('attendance.index', compact('enrollments'));
        }
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
    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $attendance->loadMissing('absence');
        return view('admin.attendances.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate(['is_absent' => ['nullable', 'boolean'], 'reason' => ['nullable', 'string']]);
        $is_absent = $request->input('is_absent');
        $reason = $request->input('reason');

        // duplicate code here.
        if ($attendance->absence) {
            if ($is_absent) {
                if (str($reason)->lower()->contains('no reason') || str($reason)->isEmpty())
                    $attendance->update(['absence_id' => 1]);
                else if ($attendance->absence_id != 1)
                    $attendance->absence->update(['reason' => $reason]);
                else {
                    $ab = $attendance->absence()->create(['user_id' => $attendance->user_id, 'reason' => $reason, 'attendance_id' => $attendance->id]);
                    $attendance->update(['absence_id' => $ab->id]);
                }
            } else if ($attendance->absence_id == 1)
                $attendance->update(['absence_id' => null]);
            else {
                $attendance->update(['absence_id' => null]);
                $attendance->absence->delete();
            }
        } else if ($is_absent)
            if (str($reason)->lower()->contains('no reason') || str($reason)->isEmpty())
                $attendance->update(['absence_id' => 1]);
            else {
                $ab = $attendance->absence()->create(['user_id' => $attendance->user_id, 'reason' => $reason, 'attendance_id' => $attendance->id]);
                $attendance->update(['absence_id' => $ab->id]);
            }

        return redirect()->route('admin.attendances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}

<?php

use App\Models\ConductedClass;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('attendance:scan', function () {
    $now = now();
    $conducted_classes = ConductedClass::with(['classSchedule', 'classSchedule.enrollments', 'classSchedule.attendances', 'classSchedule.enrollments.attendances'])
        ->whereIsDone(false)->get();
    foreach ($conducted_classes as $cc) {
        $schedule_time = Carbon::createFromFormat('H:i', $cc->classSchedule->end_time);
        $diff = $now->diff($schedule_time);
        if (!$diff->invert)
            continue;

        $enrs = $cc->classSchedule->enrollments->each(function ($enr) {
            $enr->attendances = $enr->attendances->reject(function ($att) use ($enr) {
                /** @var \App\Models\Attendance $att */
                return ($att->user_id === $enr->user_id) && ($att->created_at->isCurrentDay());
            });
        });

        foreach ($enrs as $e) {
            $this->comment($e->user->name);
            $this->comment($e->class_schedule->course_class->course->name);
            $this->comment('');
        }
    }
})->purpose('Scans the attendance database with conducted class sessions'
    . ' and enrollments to mark non-attendant users absent');

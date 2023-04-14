<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'start_date',
        'end_date',
    ];

    protected $with = [
        'course',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function classSchedules(): HasMany
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function getExpectedNumberOfClasses(ClassSchedule|null $classSchedule = null)
    {
        $cs = $classSchedule ?? $this->classSchedules()->limit(1)->get('days');
        $days = $classSchedule ? $cs->days : $cs[0]->days;

        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);

        $repeatedDays = [];

        foreach ($days as $day) {
            $dayOfWeek = Carbon::parse("next $day")->dayOfWeek;
            $date = $startDate->copy()->next($day);
            while ($date->between($startDate, $endDate)) {
                if (isset($repeatedDays[$dayOfWeek]))
                    $repeatedDays[$dayOfWeek]++;
                else
                    $repeatedDays[$dayOfWeek] = 1;
                $date->addWeek();
            }
        }

        $count = 0;
        foreach ($repeatedDays as $dayCount)
            if ($dayCount > 1)
                $count += $dayCount;

        return $count;
    }

    public function getDurationDateAttribute(): string
    {
        $start = Carbon::createFromFormat('Y-m-d', $this->start_date)->format('d/m/y');
        $end = Carbon::createFromFormat('Y-m-d', $this->end_date)->format('d/m/y');
        return $start . ' - ' . $end;
    }
}

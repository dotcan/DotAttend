<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_class_id',
        'location',
        'days',
        'start_time',
        'end_time',
    ];

    protected $with = [
        'course_class',
        'conductedClasses',
    ];

    protected $casts = [
        'days' => 'array'
    ];

    public function course_class(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function conductedClasses(): HasMany
    {
        return $this->hasMany(ConductedClass::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function getDaysFormattedAttribute(): string
    {
        return implode(', ', $this->days);
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i')
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i')
        );
    }

    public function getStartTimeFormattedAttribute(): string
    {
        return Carbon::createFromFormat('H:i', $this->start_time)->format('h:iA');
    }

    public function getEndTimeFormattedAttribute(): string
    {
        return Carbon::createFromFormat('H:i', $this->end_time)->format('h:iA');
    }
}

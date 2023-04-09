<?php

namespace App\Models;

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

    public function getDaysFormattedAttribute(): string
    {
        return implode(', ', $this->days);
    }
}

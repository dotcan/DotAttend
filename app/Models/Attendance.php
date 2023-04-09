<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'absence_id',
        'class_schedule_id',
        'enrollment_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function absence(): BelongsTo|null
    {
        return $this->belongsTo(Absence::class);
    }

    public function class_schedule(): BelongsTo
    {
        return $this->belongsTo(ClassSchedule::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConductedClass extends Model
{
    protected $fillable = [
        'class_schedule_id',
        'is_done',
    ];

    public function class_schedule(): BelongsTo
    {
        return $this->belongsTo(ClassSchedule::class);
    }
}

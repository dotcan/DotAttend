<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RfidScanner extends Model
{
    protected $fillable = [
        'location',
        'is_marking_attendance',
        'esp_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

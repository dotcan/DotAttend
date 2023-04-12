<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RfidScanner extends Model
{
    protected $fillable = [
        'location',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

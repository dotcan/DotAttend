<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfidScanner extends Model
{
    protected $fillable = [
        'location',
    ];
}

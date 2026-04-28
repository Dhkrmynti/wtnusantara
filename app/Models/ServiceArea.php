<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    protected $fillable = ['name', 'coordinates', 'type', 'color', 'status'];

    protected $casts = [
        'coordinates' => 'array',
        'status' => 'boolean',
    ];
}

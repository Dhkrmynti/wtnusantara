<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MikrotikSetting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'last_connected_at' => 'datetime',
    ];
}

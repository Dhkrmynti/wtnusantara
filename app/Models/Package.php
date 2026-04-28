<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'json',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}

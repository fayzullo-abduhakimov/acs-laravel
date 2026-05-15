<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'address', 'city', 'state', 'postal_code',
        'sources', 'attendance_days',
    ];

    protected function casts(): array
    {
        return [
            'sources' => 'array',
            'attendance_days' => 'array',
        ];
    }
}

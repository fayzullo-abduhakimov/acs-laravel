<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'redirect_url', 'is_opened', 'status'];

    public function scopeVisibility(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function scopeOrder(Builder $query): void
    {
        $query->orderBy('id', 'asc');
    }
}

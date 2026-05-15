<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramDate extends Model
{
    protected $fillable = ['date'];

    protected function casts(): array
    {
        return ['date' => 'date'];
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ProgramSession::class, 'date_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProgramSession extends Model
{
    use HasTranslations;

    protected $fillable = ['date_id', 'title', 'content', 'sort'];

    public array $translatable = ['title', 'content'];

    public function date(): BelongsTo
    {
        return $this->belongsTo(ProgramDate::class, 'date_id');
    }
}

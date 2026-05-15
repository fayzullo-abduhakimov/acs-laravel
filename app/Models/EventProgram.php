<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class EventProgram extends Model
{
    use HasTranslations;

    protected $fillable = [
        'day', 'start_time', 'end_time', 'tag_id', 'location_id',
        'title', 'description', 'bg_color', 'status', 'order_by',
    ];

    public array $translatable = ['title', 'description'];

    protected function casts(): array
    {
        return ['day' => 'date'];
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}

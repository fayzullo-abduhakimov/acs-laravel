<?php

namespace App\Models;

use App\Models\Concerns\HasStorageImage;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasStorageImage;
    use HasTranslations;

    protected $fillable = [
        'image', 'slug', 'title', 'description', 'content',
        'status', 'order_by', 'published_date',
    ];

    public array $translatable = ['title', 'description', 'content'];

    protected function casts(): array
    {
        return ['published_date' => 'datetime'];
    }
}

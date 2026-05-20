<?php

namespace App\Models;

use App\Models\Concerns\HasStorageImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasStorageImage;
    use HasTranslations;

    protected $fillable = ['name', 'image', 'title', 'content', 'status', 'order_by'];

    public array $translatable = ['title', 'content'];

    public function images(): HasMany
    {
        return $this->hasMany(LocationImage::class);
    }
}

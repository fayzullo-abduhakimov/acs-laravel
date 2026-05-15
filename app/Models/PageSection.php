<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class PageSection extends Model
{
    use HasTranslations;

    protected $fillable = ['page_id', 'name', 'image', 'title', 'subtitle', 'content', 'sort'];

    public array $translatable = ['title', 'subtitle', 'content'];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public static function getSection(string $sectionName, string $pageName): ?self
    {
        return static::whereHas('page', fn ($q) => $q->where('name', $pageName))
            ->where('name', $sectionName)
            ->with('galleryItems')
            ->first();
    }

    public function galleryItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'section_id');
    }
}

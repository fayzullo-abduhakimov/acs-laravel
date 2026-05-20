<?php

namespace App\Models;

use App\Models\Concerns\HasStorageImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class PageSection extends Model
{
    use HasStorageImage;
    use HasTranslations;

    protected $fillable = ['page_id', 'name', 'image', 'title', 'subtitle', 'content', 'sort'];

    public array $translatable = ['title', 'subtitle', 'content'];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public static function getSection(string $sectionName, string $pageName): ?self
    {
        return static::forPage($pageName, [$sectionName])->first();
    }

    /**
     * Fetch every page section keyed by `name` in a single query.
     * Use this whenever a view needs several sections from the same page.
     *
     * @param  array<int, string>|null  $sectionNames  filter to a subset, or null for all
     * @return \Illuminate\Support\Collection<string, self>
     */
    public static function forPageKeyed(string $pageName, ?array $sectionNames = null): \Illuminate\Support\Collection
    {
        return static::forPage($pageName, $sectionNames)->get()->keyBy('name');
    }

    /**
     * @param  array<int, string>|null  $sectionNames
     */
    public static function forPage(string $pageName, ?array $sectionNames = null)
    {
        return static::query()
            ->whereHas('page', fn ($q) => $q->where('name', $pageName))
            ->when($sectionNames, fn ($q) => $q->whereIn('name', $sectionNames))
            ->with('galleryItems');
    }

    public function galleryItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'section_id')->orderBy('sort');
    }
}

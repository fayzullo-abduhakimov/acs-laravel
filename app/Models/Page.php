<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'slug', 'title', 'meta_title', 'meta_description'];

    public array $translatable = ['title', 'meta_title', 'meta_description'];

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class);
    }
}

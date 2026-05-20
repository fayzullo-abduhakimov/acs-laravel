<?php

namespace App\Models;

use App\Models\Concerns\HasStorageImage;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ArchiveNews extends Model
{
    use HasStorageImage;
    use HasTranslations;

    protected $fillable = ['image', 'title', 'description', 'status', 'order_by'];

    public array $translatable = ['title', 'description'];
}

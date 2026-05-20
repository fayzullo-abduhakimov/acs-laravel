<?php

namespace App\Models;

use App\Models\Concerns\HasStorageImage;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasStorageImage;
    use HasTranslations;

    protected $fillable = ['image', 'file', 'link', 'author', 'name', 'description', 'status', 'order_by'];

    public array $translatable = ['author', 'name', 'description'];
}

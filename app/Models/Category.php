<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, HasTranslations, HasSlug;


    /** @var array<string> */
    protected $fillable = ['name', 'slug', 'seo_description', 'seo_keywords'];

    protected $casts = [
        'name' => 'array',
        'seo_description' => 'array',
        'seo_keywords' => 'array',
    ];

    /** @var array<string> */
    protected $translatable = ['name', 'seo_description'];

    /** @var array<string> */
    protected $sluggable = ['slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage('en')
            ->saveSlugsTo('slug');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id');
    }
}

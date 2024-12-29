<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, HasTranslations, HasSlug;

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'image',
        'seo_description',
        'seo_keywords',
        'content',
        'is_published',
        'tags',
    ];

    protected $casts = [
        'title' => 'array',
        'seo_description' => 'array',
        'content' => 'array',
        'is_published' => 'boolean',
        'tags' => 'array',
    ];

    protected $translatable = [
        'title',
        'seo_description',
        'seo_keywords',
        'content',
    ];

    protected $sluggable = [
        'slug',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage('en')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('create-post', function () {
    $post = new PostController();
    $data = $post->generate();
    $data['user_id'] = 1;
    Post::create($data);
    $this->comment('Post created: ' . $data['title']['ru']);
})->purpose('Generate a new post')->hourly();

<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('create-post', function () {
    $category = Category::inRandomOrder()->first();
    $post = new PostController();
    $data = $post->generate($category->name);
    $data['user_id'] = User::inRandomOrder()->first()->id;
    $data['slug'] = \Str::slug($data['title']['ru']);
    $category->posts()->create($data);
    $this->comment('Post created: ' . $data['title']['ru']);
})->purpose('Generate a new post')->hourly();


Artisan::command('telegram:set-webhook', function(){
    $response =Http::post('https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/setWebhook?url='.env('TELEGRAM_WEBHOOK_URL'));
})->purpose('Set Telegram webhook')->hourly();

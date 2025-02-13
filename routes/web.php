<?php

use App\Ai\Chat;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostController;
use Illuminate\Support\Facades\Route;
use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;


Route::get('/test', function(){
    $data = [];

    $client = new Client(env('GEMINI_API_KEY'));
    $title = $client->withV1BetaVersion()
        ->generativeModel(ModelName::GEMINI_1_5_FLASH)
        ->withSystemInstruction('Ты автор вымышленных новостей. Я буду давать тебе категорию поста, и ты должен написать только заголовок. Без кавычек, тегов, символов перевода строки и лишних пробелов. Верни только текст заголовка')
        ->generateContent(
            new TextPart('Технологии'),
        );

    $data['title'] = $title->text();

    $content = $client->withV1BetaVersion()
        ->generativeModel(ModelName::GEMINI_1_5_FLASH)
        ->withSystemInstruction('Ты автор вымышленных новостей. Я буду давать тебе титул поста, и ты должен написать HTML-код статьи без символов перевода строки. Верни только чистый HTML-код в одну строку без тегов ```html и без форматирования.')
        ->generateContent(
            new TextPart('Технологии'),
        );

    $data['content'] = $content->text();


    $title_en = $client->withV1BetaVersion()
        ->generativeModel(ModelName::GEMINI_1_5_FLASH)
        ->withSystemInstruction('Переведи на английский Без кавычек, тегов, символов перевода строки и лишних пробелов. Верни только текст заголовка')
        ->generateContent(
            new TextPart($data['title']),
        );

    $data['title_en'] = $title_en->text();

    $content_en = $client->withV1BetaVersion()
        ->generativeModel(ModelName::GEMINI_1_5_FLASH)
        ->withSystemInstruction('Переведи на английский')
        ->generateContent(
            new TextPart($data['content']),
        );

    $data['content_en'] = $content_en->text();

    dd($data);
});


Route::get('/', function(){
    $locale = app()->getLocale();

    return redirect()->route('home', $locale);
});

Route::group(['prefix' => '{locale}', 'middleware' => [\App\Http\Middleware\SetLocale::class]], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'message'])->name('contact.message');
    Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');
    Route::get('/post/{slug}', [PostController::class, 'index'])->name('post');
    Route::post('/post/{slug}/comment', [PostController::class, 'leave_a_comment'])->name('post.comment');
});

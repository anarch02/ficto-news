<?php

use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostController;
use Illuminate\Support\Facades\Route;

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

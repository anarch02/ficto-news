<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(string $slug)
    {
        return view('pages.post', [
            'post' => Post::where('slug', $slug)->firstOrFail(),
        ]);
    }
}

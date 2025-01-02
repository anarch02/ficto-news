<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(string $locale, string $slug)
    {
        return view('pages.post', [
            'post' => Post::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function leave_a_comment(Request $request, string $locale, string $slug)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'text' => ['required', 'string'],
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $post->comments()->create($data);

        return redirect()->route('post', ['locale' => $locale, 'slug' => $slug]);
    }
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(10);
        $categories = Category::all();

        return view('pages.category', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}

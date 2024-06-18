<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $category = $request->input('category');

        if ($category) {
            $posts = Post::where('category_id', $category)->get();
        } else {
            $posts = Post::all();
        }
        return view('post.index', compact('posts', 'categories', 'category'));
    }
}

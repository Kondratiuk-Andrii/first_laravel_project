<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\IndexRequest;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
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

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\IndexRequest;
use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $category = $request->input('category');
        $posts = $this->service->index($category);
        $categories = Category::all();

        return view('post.index', compact('posts', 'categories', 'category'));
    }
}

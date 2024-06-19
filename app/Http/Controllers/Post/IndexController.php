<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\IndexRequest;

use App\Models\Category;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $categories = Category::all();

        $posts = $this->service->index($data);

        return view('post.index', compact('posts', 'categories'));
    }
}

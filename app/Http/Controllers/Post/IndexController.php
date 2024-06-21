<?php

namespace App\Http\Controllers\Post;


use App\Http\Requests\Post\IndexRequest;

use App\Http\Resources\Post\PostResource;
// use App\Models\Category;


class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        // $categories = Category::all();

        $posts = $this->service->index($data);

        return PostResource::collection($posts);
        // return view('post.index', compact('posts', 'categories'));
    }
}

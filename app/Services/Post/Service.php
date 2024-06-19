<?php

namespace App\Services\Post;

use App\Http\Filters\PostFilter;
use App\Models\Post;

class Service
{
    public function index($data)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        return Post::filter($filter)->paginate(20);
    }

    public function store($data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
    }

    public function destroy($post)
    {
        $post->delete();
    }
}

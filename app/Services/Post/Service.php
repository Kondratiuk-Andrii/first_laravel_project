<?php

namespace App\Services\Post;

use App\Http\Filters\PostFilter;
use App\Models\Post;

class Service
{
    public function index($data)
    {
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        return Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
    }

    public function store($data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);

        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return $post->fresh();
    }

    public function destroy($post)
    {
        $post->delete();
    }
}

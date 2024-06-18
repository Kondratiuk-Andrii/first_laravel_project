<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function index($category = null)
    {
        if ($category) {
            return Post::where('category_id', $category)->get();
        } else {
            return Post::all();
        }
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

    public function destroy($post){
        $post->delete();
    }
}
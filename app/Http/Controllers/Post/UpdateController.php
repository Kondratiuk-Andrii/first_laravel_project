<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'likes' => 'integer',
            'is_published' => 'boolean',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'] ?? [];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}

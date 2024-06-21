<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {

//        Gate::authorize('view', auth()->user());

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }
}

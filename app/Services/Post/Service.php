<?php

namespace App\Services\Post;

use App\Http\Filters\PostFilter;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

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
        try {
            Db::beginTransaction();

            $tags = $data['tags'] ?? [];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryId($category);
            $post = Post::create($data);
            $post->tags()->attach($this->getTagIds($tags));

            Db::commit();
            return $post;
        } catch (\Exception $e) {
            Db::rollBack();
            return $e->getMessage();
        }
    }

    public function update($post, $data)
    {
        try {
            Db::beginTransaction();

            $tags = $data['tags'] ?? [];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);
            $post->update($data);
            $post->tags()->sync($this->getTagIdsWithUpdate($tags));

            Db::commit();
            return $post->fresh();
        } catch (\Exception $e) {
            Db::rollBack();
            return $e->getMessage();
        }
    }

    public function destroy($post)
    {
        $post->delete();
    }

    private function getCategoryId($item)
    {
        return $item['id'] ?? Category::create($item)->id;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if (isset($item['id'])) {
            $category = Category::find($item['id']);
            $category->update($item);
            return $category->fresh()->id;
        }
        return Category::create($item)->id;
    }

    private function getTagIds($tags)
    {
        return array_map(function ($tag) {
            return $tag['id'] ?? Tag::create($tag)->id;
        }, $tags);
    }
    private function getTagIdsWithUpdate($tags)
    {
        return array_map(function ($tag) {
            if (isset($tag['id'])) {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                return $currentTag->fresh()->id;
            }
            return Tag::create($tag)->id;
        }, $tags);
    }
}

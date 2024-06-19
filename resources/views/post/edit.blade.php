@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Edit a Post #{{ $post->id }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="text" name="image" id="image" class="form-control" value="{{ $post->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="likes" class="form-label">Likes:</label>
                        <input type="number" name="likes" id="likes" class="form-control" value="{{ $post->likes }}" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="is_published" class="form-label">Published</label>
                        <select name="is_published" id="is_published" class="form-select">
                            <option value="1" {{ $post->is_published ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$post->is_published ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">The category field is required</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <div>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}" class="form-check-input" value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->title }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection

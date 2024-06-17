@extends('layouts.main')

@section('content')
    <div class="holder">
        <div class="edit-post">
            <h1 class="edit-post__title">Edit a Post #{{ $post->id }}</h1>
            <form action="{{ route('post.update', $post->id) }}" method="POST" class="edit-post__form">
                @csrf
                @method('PUT')
                <div class="edit-post__field">
                    <label for="title" class="edit-post__label">Title:</label>
                    <input class="edit-post__input" type="text" name="title" id="title" value="{{ $post->title }}">
                </div>
                <div class="edit-post__field">
                    <label class="edit-post__label" for="content">Content:</label>
                    <textarea name="content" id="content" class="edit-post__textarea" rows="5">{{ $post->content }}</textarea>
                </div>
                <div class="edit-post__field">
                    <label for="image" class="edit-post__label">Image:</label>
                    <input class="edit-post__input" type="text" name="image" id="image"
                        value="{{ $post->image }}">
                </div>
                <div class="edit-post__field">
                    <label for="likes" class="edit-post__label">Likes:</label>
                    <input class="edit-post__input" type="number" name="likes" id="likes" value="{{ $post->likes }}"
                        min="0">
                </div>
                <div class="edit-post__field">
                    <label class="edit-post__label" for="is_published">Published</label>
                    <select class="edit-post__select" name="is_published" id="is_published">
                        <option value="1" {{ $post->is_published ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$post->is_published ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="edit-post__field">
                    <label class="edit-post__label" for="category">Category</label>
                    <select class="edit-post__select" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="edit-post__field">
                    <label class="edit-post__label" for="tags">Tags</label>
                    <div class="edit-post__tags">
                        @foreach ($tags as $tag)
                            <div class="edit-post__tag">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    id="tag_{{ $tag->id }}"
                                    {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label for="tag_{{ $tag->id }}">{{ $tag->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="edit-post__button">Save Changes</button>
            </form>
        </div>
    </div>
@endsection

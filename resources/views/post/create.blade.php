@extends('layouts.main')

@section('content')
    <div class="holder">
        <div class="create-post">
            <h1 class="create-post__title">Create a new Post</h1>
            <form action="{{ route('post.store') }}" method="POST" class="create-post__form">
                @csrf
                <div class="create-post__field">
                    <label for="title" class="create-post__label">Title:</label>
                    <input class="create-post__input" type="text" name="title" id="title" placeholder="Title"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="create-post__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-post__field">
                    <label class="create-post__label" for="content">Content:</label>
                    <textarea name="content" id="content" placeholder="Content" class="create-post__textarea">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="create-post__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-post__field">
                    <label for="image" class="create-post__label">Image:</label>
                    <input class="create-post__input" type="text" name="image" id="image" placeholder="Image"
                        value="{{ old('image') }}">
                </div>
                <div class="create-post__field">
                    <label for="category" class="create-post__label">Category:</label>
                    <select name="category_id" id="category" class="create-post__input">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="create-post__error">The category field is required.</p>
                    @enderror
                </div>
                <div class="create-post__field">
                    <label class="create-post__label" for="tags">Tags:</label>
                    <div class="create-post__tags">
                        @foreach ($tags as $tag)
                            <div class="create-post__tag">
                                <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                                    value="{{ $tag->id }}">
                                <label for="tag_{{ $tag->id }}">{{ $tag->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="create-post__button">Create Post</button>
            </form>
        </div>
    </div>
@endsection

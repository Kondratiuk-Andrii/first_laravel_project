@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Create a new Post</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                               value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Content"
                                  rows="5">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="text" name="image" id="image" class="form-control" placeholder="Image"
                               value="{{ old('image') }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category_id" id="category" class="form-select">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">The category field is required</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <div>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                                           class="form-check-input" value="{{ $tag->id }}">
                                    <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->title }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection

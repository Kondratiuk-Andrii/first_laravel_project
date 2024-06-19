@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Post Details #{{ $post->id }}</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h5>Title:</h5>
                    <p>{{ $post->title }}</p>
                </div>
                <div class="mb-3">
                    <h5>Content:</h5>
                    <p>{{ $post->content }}</p>
                </div>
                <div class="mb-3">
                    <h5>Image:</h5>
                    <p>{{ $post->image }}</p>
                </div>
                <div class="mb-3">
                    <h5>Likes:</h5>
                    <p>{{ $post->likes }}</p>
                </div>
                <div class="mb-3">
                    <h5>Published:</h5>
                    <p>{{ $post->is_published ? 'Yes' : 'No' }}</p>
                </div>
                <div class="mb-3">
                    <h5>Category:</h5>
                    <p>{{ $post->category->title }}</p>
                </div>
                <div class="mb-3">
                    <h5>Tags:</h5>
                    <p>
                        @if ($post->tags && $post->tags->count() > 0)
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-secondary">{{ $tag->title }}</span>
                            @endforeach
                        @else
                            No tags
                        @endif
                    </p>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ route('post.edit', $post->id) }}" method="GET" class="d-inline">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

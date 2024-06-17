@extends('layouts.main')

@section('content')
    <div class="holder">
        <div class="post-detail">
            <h1 class="post-detail__title">Post Details #{{ $post->id }}</h1>
            <div class="post-detail__body">
                <div class="post-detail__item">
                    <span class="post-detail__label">Title:</span>
                    <span class="post-detail__value">{{ $post->title }}</span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Content:</span>
                    <span class="post-detail__value">{{ $post->content }}</span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Image:</span>
                    <span class="post-detail__value">{{ $post->image }}</span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Likes:</span>
                    <span class="post-detail__value">{{ $post->likes }}</span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Published:</span>
                    <span class="post-detail__value">
                        @if ($post->is_published)
                            Yes
                        @else
                            No
                        @endif
                    </span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Category:</span>
                    <span class="post-detail__value">
                        {{ $post->category->title }}
                    </span>
                </div>
                <div class="post-detail__item">
                    <span class="post-detail__label">Tags:</span>
                    <span class="post-detail__value">
                        @if ($post->tags && $post->tags->count() > 0)
                            @foreach ($post->tags as $tag)
                                <span class="post-detail__tag">{{ $tag->title }}</span>{{ !$loop->last ? ' ' : '' }}
                            @endforeach
                        @else
                            No tags
                        @endif
                    </span>
                </div>
            </div>
            <div class="post-detail__actions">
                <form action="{{ route('post.edit', $post->id) }}" method="GET" class="post-detail__form-edit">
                    <button class="post-detail__button-edit" type="submit">Edit</button>
                </form>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="post-detail__form-delete">
                    @csrf
                    @method('DELETE')
                    <button class="post-detail__button-delete" type="submit">Delete</button>
                </form>
            </div>



        </div>
    </div>
@endsection

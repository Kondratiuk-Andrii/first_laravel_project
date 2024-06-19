@extends('layouts.admin')

@section('content')
    <div class="content">
            <div class="posts">
                @foreach ($posts as $post)
                    <div class="post">
                        <a href="{{ route('post.show', $post->id) }}" class="post__title">
                            {{ $post->title }}
                        </a>
                        <div class="post__details">
                            <div class="post__category">Category: {{ $post->category->title }}</div>
                            <div class="post__tags">
                                Tags:
                                @if ($post->tags && $post->tags->count() > 0)
                                    @foreach ($post->tags as $tag)
                                        <span class="tag">{{ $tag->title }}</span>
                                    @endforeach
                                @else
                                    No tags
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            <div class="pagination-container">
                {{ $posts->withQueryString()->links('pagination') }}
            </div>
        </div>
@endsection

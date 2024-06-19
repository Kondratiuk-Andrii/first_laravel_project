@extends('layouts.main')

@section('content')
    <div class="holder">
        <div class="sidebar">
            <div class="categories">
                <div class="categories__title">
                    Categories
                </div>
                <div class="categories__list">
                    <div class="categories__item ">
                        <a href="{{ route('post.index') }}"
                            class="categories__link {{ !request()->has('category') ? 'active' : '' }}">
                            All categories
                        </a>
                    </div>
                    @foreach ($categories as $category)
                        <div class="categories__item">
                            <a href="{{ route('post.index', ['category' => $category->id]) }}"
                                class="categories__link {{ request('category') == $category->id ? 'active' : '' }}">
                                {{ $category->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
                {{ $posts->links('pagination') }}
            </div>
        </div>
    </div>
@endsection

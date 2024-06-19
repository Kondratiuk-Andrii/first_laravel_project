@extends('layouts.admin')

@section('content')
    <!-- Content -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ route('post.show', $post->id) }}" class="card-title h5">
                                        {{ $post->title }}
                                    </a>
                                    <p class="card-text">
                                        <strong>Category:</strong> {{ $post->category->title }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Tags:</strong>
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
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Посты по категориям {{ $categoryTitle }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="post-category">{{ $post->category?->title ?? 'Без категории' }}</p>
                                @auth()
                                <form method="post" action="{{ route('post.likes.store', $post->id) }}">
                                    @csrf
                                    <span> {{ $post->liked_users_count }} </span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @auth()
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="nav-icon fas fa-heart"></i>
                                            @else
                                                <i class="nav-icon far fa-heart"></i>
                                            @endif
                                        @endauth
                                    </button>
                                </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span> {{ $post->liked_users_count }} </span>
                                        <i class="nav-icon far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>

            </section>

        </div>
    </main>
@endsection

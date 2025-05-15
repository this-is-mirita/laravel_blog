@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->translatedFormat('F') }} {{ $date->day }} , {{ $date->year }}
                • {{ $date->format('H:i') }} <br>
                • {{ $post->comments->count() }} Коментариев • {{ $post->likedUsers->count() }} добавили в избранное
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    {!! $post->content  !!}
                </div>
            </section>
            <section>
                @auth
                    <form method="POST" action="{{ route('post.likes.store', $post->id) }}">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent d-flex align-items-center">
                            <span class="me-1">{{ $post->liked_users_count }}</span>
                            @if(auth()->user()->likedPosts->contains($post->id))
                                <i class="nav-icon fas fa-heart text-danger"></i>
                            @else
                                <i class="nav-icon far fa-heart"></i>
                            @endif
                        </button>
                    </form>
                @else
                    <div class="d-flex align-items-center">
                        <span class="me-1">{{ $post->liked_users_count }} </span>
                        <i class="nav-icon far fa-heart me-1"></i>
                    </div>
                @endauth
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты (По категориям)</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{ $post->category?->title ?? 'Без категории' }}</p>
                                        <a href="{{route('post.show', $relatedPost->id)}}">
                                            <h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment-list mt-5">
                        <h2 class="section-title mb-4" data-aos="fade-up">
                            Комментарии ({{ $post->comments->count() }})
                        </h2>

                        @foreach($post->comments as $comment)
                            <div class="border rounded p-4 mb-3" data-aos="fade-up">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <small class="text-muted">{{ $comment->DateAsCarbon->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0">{{ $comment->message }}</p>
                            </div>
                        @endforeach
                    </section>

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection

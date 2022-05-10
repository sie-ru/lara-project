@extends('base.base')
@auth()
    @section('title', '@'.auth('web')->user()->name)
@endauth
@guest
    @section('title', '')
@endguest
@section('body')
    <main>
        <div id="carousel-home">

            <div class="owl-carousel owl-theme">
                @foreach($posts as $post)
                <div class="owl-slide cover" style="background-image: url({{ asset('/storage/post_covers' . $post->cover) }});">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.9)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-end">
                                <div class="col-lg-6 static">
                                    <div class="slide-text text-end white">
                                        <h2 class="owl-slide-animated owl-slide-title">
                                            {{ $post->title }}
                                            @if($post->preview)
                                            <span class="py-2 opacity-75 fs-5">{{\Illuminate\Support\Str::limit($post->preview, 100)}}</span>
                                            @else
                                                <span class="py-2 opacity-75 fs-5">{{\Illuminate\Support\Str::limit($post->description, 100)}}</span>
                                            @endif
                                            <span>{{'by'. ' @' .$post->uname}}<span>
                                        </h2>
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ route('post', $post->id) }}" role="button">Read more</a></div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center search_trends">
                                        <ul>
                                            @foreach($post->tags as $tag)
                                            <li><a href="{{ route('search_by_tag', $tag->tag) }}">{{ '#'.$tag->tag }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="icon_drag_mobile"></div>
            <div class="wave hero"></div>
        </div>

        <div class="container margin_90_60">
            <div class="main_title version_2">
                <span><em></em></span>
                <h2>New posts</h2>
                <a href="{{ route('feed') }}">View All <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row justify-content-start">
                @foreach($posts as $post)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-cue="slideInUp">
                        <div class="strip">
                            <figure>
                                <img src="{{ asset('/storage/post_covers' . $post->cover) }}" class="lazy" alt="" width="533" height="400">
                                <a href="{{ route('post', $post->id) }}" class="strip_info">
                                    <div class="item_title">
                                        <h3>{{ $post->title }}</h3>
                                        <small style="opacity: 0.7;">{{ \Illuminate\Support\Str::limit($post->description, 60) }}</small>
                                    </div>
                                </a>
                            </figure>
                            <ul>
                                <li>
                                    @auth()
                                    <a href="{{ auth('web')->user()->id == $post->uid ? route('user_profile', auth('web')->user()->id) : route('author', $post->uid) }}" class="author">
                                    @endauth
                                    @guest()
                                    <a href="{{ route('author', $post->uid) }}" class="author">
                                    @endguest
                                        <div class="author_thumb">
                                            <figure>
                                                <img src="{{ asset('/storage/user_avatars' . $post->avatar) }}" alt="{{ $post->uname }}" class="lazy" width="100" height="100"></figure>
                                        </div>
                                        <h6>{{ '@' . $post->uname }}</h6>
                                    </a>
                                <li><i class="bi bi-chat px-1"></i>{{ $post->comments_count }}</li>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg_gray">
            <div class="container margin_90_60">
                <div class="main_title version_2">
                    <span><em></em></span>
                    <h2>Top Authors</h2>
                    <a href="#0">View All <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="row author_list">
                    @foreach($authors as $author)
                    <div class="col-lg-4 col-md-6" data-cue="slideInUp">
                        @auth()
                        <a href="{{ auth('web')->user()->id === $author->id ? route('user_profile', auth('web')->user()->id) : route('author', $author->id) }}" class="author">
                        @endauth
                        @guest()
                        <a href="{{ route('author', $author->id) }}" class="author">
                        @endguest
                            <strong>{{ $loop->index + 1 }}</strong>
                            <div class="author_thumb veryfied">
                                <i class="bi bi-check"></i>
                                <figure>
                                    <img src="{{ asset('/storage/user_avatars' . $author->avatar) }}" alt="" class="lazy" width="100" height="100">
                                </figure>
                            </div>
                            <div class="d-flex flex-column">
                                <h6>{{ '@'.$author->name }}</h6>
                                <span>{{ $author->posts_count . ' ' }}{{$author->posts_count >= 2 ? 'posts' : 'post'}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                @guest()
                <div class="banner mt-5 lazy"  data-cue="slideInUp">
                    <div class="d-flex align-items-center opacity-mask justify-content-between p-5" data-opacity-mask="rgba(0, 0, 0, 0.2)">
                        <div>
                            <small>Join the Community</small>
                            <h3>Become a Creator</h3>
                            <p>Share your articles with everyone</p>
                        </div>
                        <div><a href="{{ route('auth_reg') }}" class="btn_1 medium pulse_bt">Join Now</a></div>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </main>
@endsection

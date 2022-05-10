@extends('base.base')
@section('title', 'Feed')

@section('body')
    <main>

        <x-jarallax />
        <div class="container margin_90_60">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-6">
                            <article class="blog">
                                <figure>
                                    <a href="{{ route('post', $post->id) }}"><img src="{{ asset('/storage/post_covers' . $post->cover) }}" alt="" class="lazy" width="800" height="533">
                                    </a>
                                </figure>
                                <div class="post_info">
                                    <div class="d-flex justify-content-between">
                                        <small>{{ $post->created_at->format('d-m-Y') }}</small>
                                        <div class="d-flex justify-content-center tags">
                                            @foreach($post->tags as $tag)
                                            <span class="mx-1" href="#" class="mx-1">{{'#'. $tag->tag }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h2><a href="{{ route('post', $post->id) }}">{{ $post->title }}</a></h2>
                                    <p>{{ $post->description }}</p>
                                    <ul>
                                        <li>
                                            <div class="thumb"><img src="{{ asset('/storage/user_avatars' . $post->avatar) }}" class="lazy" alt="" width="68" height="68"></div>
                                            {{ $post->uname }}
                                        </li>
                                        <li><i class="bi bi-chat"></i>{{ $post->comments_count }}</li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
{{--                    <div class="pagination_fg">--}}
{{--                        <a href="#">&laquo;</a>--}}
{{--                        <a href="#" class="active">1</a>--}}
{{--                        <a href="#">2</a>--}}
{{--                        <a href="#">3</a>--}}
{{--                        <a href="#">4</a>--}}
{{--                        <a href="#">5</a>--}}
{{--                        <a href="#">&raquo;</a>--}}
{{--                    </div>--}}
                </div>

                <aside class="col-lg-3">
                    <div class="widget search_blog">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Terms...">
                                <span><input type="submit" value="Search"></span>
                            </div>
                        </form>
                    </div>
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Popular Tags</h4>
                        </div>
                        <div class="tags">
                            @foreach($tags as $tag)
                            <a href="{{ route('search_by_tag', $tag->tag)  }}">{{'#'.$tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
@endsection

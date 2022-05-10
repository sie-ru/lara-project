@extends('base.base')
@section('title', $post->title)

@section('body')
    <main>
        <div class="container mt-4 py-1">
            <div class="row">
                <div class="col-xl-8 col-lg-7 margin_detail mt-lg-5">
                    <div class="box_general">
                        <div class="post_cover">
                            <img src="{{ asset('/storage/post_covers' . $post->cover) }}" alt="" width="1000" height="500">
                        </div>
                        <div class="main_info_wrapper">
                            <div class="main_info">
                                <div class="clearfix mb-3">
                                    <div class="item_desc">
                                        <div class="mb-3">
                                            <a href="author.html" class="author">
                                                <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                    <figure>
                                                        <img src="{{ asset('/storage/user_avatars' . $post->user->avatar) }}" alt="" class="lazy loaded" width="100" height="100" data-was-processed="true">
                                                    </figure>
                                                </div>
                                                <h6 class="ms-1"><span>Creator</span>{{ '@'.$post->user->name }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mb-md-2">{{ $post->title }}</h1>
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    </div>
                    @auth()
                    {{--Comment form--}}
                    <form class="col-12" action="{{ route('comment_add', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comments2" rows="3" placeholder="Comment"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit2" class="btn_1">Add</button>
                        </div>
                    </form>
                    @endauth
                    {{--Comments--}}
                    <div class="tabs_detail">
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">

                                    <div class="pt-4">
                                        <div class="author_list">
                                            @foreach($comments as $comment)
                                            <a href="" class="author" style="padding: 15px">
                                                <div class="author_thumb veryfied">
                                                    <figure>
                                                        <img src="{{ asset('/storage/user_avatars' . $comment->user->avatar) }}" alt="" class="lazy" width="100" height="100">
                                                    </figure>
                                                </div>
                                                <div class="d-flex flex-column justify-content-between">
                                                    <h6>{{ $comment->comment }}</h6>
                                                    <span>by {{ '@'.$comment->user->name }} <em></em> at {{ $comment->created_at }}</span>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5" id="sidebar_fixed">
                    <div class="box_bid">
                        <div class="main_profile m-0">
                            <div class="author">
                                <div class="author_thumb veryfied">
                                    <figure>
                                        <img src="{{ asset('/storage/user_avatars' . $post->user->avatar) }}" alt="" class="lazy" width="100" height="100">
                                    </figure>
                                </div>
                            </div>
                            <h1 class="mb-3">{{ '@'.$post->user->name }}</h1>
                            <p>
                                <a href="" class="btn_1 full-width">Follow</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('base.base')
@section('title', 'Author profile')

@section('body')
    <main>
        <x-jarallax />
        <div class="container margin_30_40">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="main_profile">
                        <div class="author">
                            <div class="author_thumb veryfied">
                                <i class="bi bi-check"></i>
                                <figure>
                                    <img src="{{ asset('/storage/user_avatars' . $author->avatar) }}" alt="" class="lazy" width="100" height="100">
                                </figure>
                            </div>
                        </div>
                        <h1 class="mb-3">{{ '@'.$author->name }}</h1>
                        @auth()
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn_1 full-width mb-2">Follow</button>
                        </form>
                        @endauth
                        <ul>
                            <li>Followers <span>120</span></li>
                            <li>Following <span>56</span></li>
                            <li>Created <span>{{ $author->posts_count }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="tabs_detail">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Created</a>
                            </li>
                        </ul>
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel">

                                <div id="collapse-A" class="collapse" role="tabpanel">
                                    <div class="row mt-lg-5 mt-3">
                                        @foreach($author->posts as $post)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="strip">
                                                <figure>
                                                    <img src="{{ asset('/storage/post_covers' . $post->cover) }}" class="lazy" alt="" width="533" height="400">
                                                    <a href="{{ route('post', $post->id) }}" class="strip_info">
                                                        <div class="item_title">
                                                            <h3>{{ $post->title }}</h3>
                                                            <small>{{ $post->description }}</small>
                                                        </div>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

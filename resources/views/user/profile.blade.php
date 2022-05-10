@extends('base.base')
@section('title', '@'.auth('web')->user()->name)

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
                                    <img src="{{ asset('/storage/user_avatars' . auth('web')->user()->avatar) }}" alt="" class="lazy" width="100" height="100">
                                </figure>
                            </div>
                        </div>
                        <h1 class="mb-3">{{ '@'.auth('web')->user()->name }}</h1>
                        <p>
                            <a href="{{ route('user_edit_profile', auth('web')->user()->id) }}" class="btn_1 full-width mb-2">Edit profile</a>
                        </p>
                        <ul>
                            <li>Followers <span>120</span></li>
                            <li>Following <span>56</span></li>
                            <li>Likes Received <span>450</span></li>
                            <li>Created <span>36</span></li>
                        </ul>
                        <p>
                            <a href="{{ route('auth_logout_process') }}" class="btn_1 full-width outline">Logout</a>
                        </p>
                        @if(\Illuminate\Support\Facades\Session::has('profile_edited'))
                        <p class="text-center add_top_10 alert-primary text-black fw-normal">
                            {{ \Illuminate\Support\Facades\Session::get('profile_edited') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="tabs_detail">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a id="tab-C" href="#pane-C" class="nav-link" data-bs-toggle="tab" role="tab">Following</a>
                            </li>
                            <li class="nav-item">
                                <a id="tab-D" href="#pane-D" class="nav-link" data-bs-toggle="tab" role="tab">Followers</a>
                            </li>
                        </ul>
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-A">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A">
                                            Created
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-A" class="collapse" role="tabpanel">
                                    <div class="row mt-lg-5 mt-3">
                                        @foreach($posts as $post)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="strip">
                                                <figure>
                                                    <img src="{{ asset('/storage/post_covers' . $post->cover) }}" class="lazy" alt="" width="533" height="400">
                                                    <a href="{{ route('post', $post->id) }}" class="strip_info">
                                                        <div class="item_title">
                                                            <h3>{{ $post->title }}</h3>
                                                            <small>{{ \Illuminate\Support\Str::limit($post->description, 60) }}</small>
                                                        </div>
                                                    </a>
                                                </figure>
                                                <ul>
                                                    <li class="d-flex">
                                                        <a href="{{ route('post_edit', $post->id) }}" class="btn-primary px-4 py-2 rounded-1">Edit</a>

                                                        <form action="{{ route('post_delete_process', $post->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn-danger px-4 py-2 rounded-1 mx-2" type="submit">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /tab -->
                            <div id="pane-B" class="card tab-pane fade" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-B">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B">
                                            On Sale
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-B" class="collapse" role="tabpanel">
                                    <div class="row mt-lg-5 mt-3">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="strip">
                                                <figure>
                                                    <a href="#modal-dialog" class="btn_1 modal_popup">Place a bid</a>
                                                    <img src="../public/img/items/item-1-placeholder.png" data-src="img/items/item-12.jpg" class="lazy" alt="" width="533" height="400">
                                                    <a href="detail-page.html" class="strip_info">
                                                        <div class="item_title">
                                                            <h3>Brain Storm</h3>
                                                            <small>2.95 ETH</small>
                                                        </div>
                                                    </a>
                                                </figure>
                                                <ul>
                                                    <li>
                                                        <a href="author.html" class="author">
                                                            <div class="author_thumb">
                                                                <figure>
                                                                    <img src="../public/img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                            </div>
                                                            <h6>@George_lucas</h6>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#0" class="wish_bt"><i class="bi bi-heart-fill"></i></a> 50
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="strip">
                                                <figure>
                                                    <a href="#modal-dialog" class="btn_1 modal_popup">Place a bid</a>
                                                    <img src="../public/img/items/item-1-placeholder.png" data-src="img/items/item-11.jpg" class="lazy" alt="" width="533" height="400">
                                                    <a href="detail-page.html" class="strip_info">
                                                        <div class="item_title">
                                                            <h3>Hello World!</h3>
                                                            <small>1.25 ETH</small>
                                                        </div>
                                                    </a>
                                                </figure>
                                                <ul>
                                                    <li>
                                                        <a href="author.html" class="author">
                                                            <div class="author_thumb">
                                                                <figure>
                                                                    <img src="../public/img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100">
                                                                </figure>
                                                            </div>
                                                            <h6>@George_lucas</h6>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#0" class="wish_bt"><i class="bi bi-heart-fill"></i></a> 50
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="strip">
                                                <figure>
                                                    <a href="#modal-dialog" class="btn_1 modal_popup">Place a bid</a>
                                                    <img src="../public/img/items/item-1-placeholder.png" data-src="img/items/item-10.jpg" class="lazy" alt="" width="533" height="400">
                                                    <a href="detail-page.html" class="strip_info">
                                                        <div class="item_title">
                                                            <h3>Clock Ocean</h3>
                                                            <small>0.95 ETH</small>
                                                        </div>
                                                    </a>
                                                </figure>
                                                <ul>
                                                    <li>
                                                        <a href="author.html" class="author">
                                                            <div class="author_thumb">
                                                                <figure>
                                                                    <img src="../public/img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                            </div>
                                                            <h6>@George_lucas</h6>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#0" class="wish_bt"><i class="bi bi-heart-fill"></i></a> 50
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /tab -->
                            <div id="pane-C" class="card tab-pane fade" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-E">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-C">
                                            Following
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-C" class="collapse" role="tabpanel">
                                    <div class="follow_list mt-lg-3">
                                        <ul>
                                            <li>
                                                <div class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <div>
                                                        <h6>@George_lucas</h6>
                                                        <a href="#0">Unfollow</a>
                                                    </div>
                                                </div>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_1.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_2.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_3.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_4.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar2.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <div>
                                                        <h6>@Monica_claus</h6>
                                                        <a href="#0">Unfollow</a>
                                                    </div>
                                                </div>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_5.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_6.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_7.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_8.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar3.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <div>
                                                        <h6>@Frederick</h6>
                                                        <a href="#0">Unfollow</a>
                                                    </div>
                                                </div>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_9.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_10.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_11.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_12.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /follow_list -->
                                </div>
                            </div>
                            <!-- /tab -->
                            <div id="pane-D" class="card tab-pane fade" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-D">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-D">
                                            Followers
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-D" class="collapse" role="tabpanel">
                                    <div class="follow_list mt-lg-3">
                                        <ul>
                                            <li>
                                                <a href="#0" class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100">
                                                        </figure>
                                                    </div>
                                                    <h6>@George_lucas</h6>
                                                </a>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_1.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_2.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_3.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_4.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar2.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <h6>@Monica_claus</h6>
                                                </a>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_5.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_6.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_7.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_8.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="../public/img/avatar-placeholder.png" data-src="img/avatar3.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <h6>@Frederick</h6>
                                                </a>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_9.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_10.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_11.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="../public/img/items/item-1-placeholder.png" data-src="img/follow_list_pic_12.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /follow_list -->
                                </div>
                            </div>
                            <!-- /tab -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /tabs_detail -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

@endsection

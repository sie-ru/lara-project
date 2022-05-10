@extends('base.base')
@section('title', 'Create new')

@section('body')
    <main>
        <x-jarallax />

        <div class="container margin_30_40">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main_profile edit_section">
                        <div class="author">
                            <div class="author_thumb veryfied">
                                <i class="bi bi-check"></i>
                                <figure>
                                    <img src="{{ asset('/storage/user_avatars' . auth('web')->user()->avatar) }}" alt="" class="lazy" width="100" height="100">
                                </figure>
                            </div>
                        </div>
                        <h1>{{ '@'.auth('web')->user()->name }}</h1>
                        <ul>
                            <a href="{{ route('user_profile', auth('web')->user()->id) }}" class="btn_1 full-width mb-2">Profile</a>
                            <a href="{{ route('auth_logout_process') }}" class="btn_1 full-width outline">Logout</a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Upload post</h2>
                    </div>
                    <form action="{{ route('post_create_process') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Upload cover</label>
                                    <div class="file_upload">
                                        <input name="cover" type="file">
                                        <i class="bi bi-file-earmark-arrow-up"></i>
                                        <div>PNG, JPG, WEBP</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Preview</label>
                                    <input name="preview" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" cols="3" rows="3" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="tags[]" type="text" class="form-control" placeholder="#hashtag">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="tags[]" type="text" class="form-control" placeholder="#hashtag">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="tags[]" type="text" class="form-control" placeholder="#hashtag">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <hr class="mt-3 mb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group switch_wrapper">
                                    <label>Allow Comments</label>
                                    <p class="mb-0">Users will be able to comment on your post</p>
                                    <div class="form-check form-switch">
                                        <input name="comments_available" class="form-check-input" type="checkbox" role="switch" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn_1 text-end mt-4">Save changes</button>
                            </div>
                        </div>
                    </form>

                    <!-- /row -->


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection

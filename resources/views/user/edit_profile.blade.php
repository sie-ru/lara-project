@extends('base.base')
@section('title', '@'.auth('web')->user()->name)

@section('body')
    <main>
        <x-jarallax />

        <!-- /hero_single -->

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
                            <p>
                                <a href="{{ route('user_profile', auth('web')->user()->id) }}" class="btn_1 full-width mb-2">Profile</a>
                                <a href="{{ route('user_edit_profile', auth('web')->user()->id) }}" class="btn_1 full-width outline mb-2">Change password</a>
                                <a href="{{ route('auth_logout_process') }}" class="btn_1 full-width outline">Logout</a>
                            </p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Edit profile</h2>
                    </div>
                    <form action="{{ route('user_edit_profile_process', auth('web')->user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="name" type="text" class="form-control" value="{{ auth('web')->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input name="email" type="email" class="form-control" value="{{ auth('web')->user()->email }}">
                                </div>
                            </div>
                        </div>
                        @error('profile_edit')
                            <div class="text-center add_top_10 alert-danger text-danger fw-bolder">{{ $message }}</div>
                        @enderror
                        <!-- /row -->
                        <hr class="mt-3 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Upload avatar</label>
                                    <div class="file_upload">
                                        <input name="avatar" type="file">
                                        <i class="bi bi-file-earmark-arrow-up"></i>
                                        <div>PNG, JPG, WEBP. Max 50MB</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn_1 text-end mt-4">Save changes</button>
                    </form>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

@endsection

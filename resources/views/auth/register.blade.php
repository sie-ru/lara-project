@extends('base.base')
@section('title', 'Sing Up')
@section('page_type', 'auth')

@section('body')
    <div id="register_bg">
        <div id="login">
            <aside>
                <figure>
                    <p class="h4">Microblog.</p>
                    <p>Sing Up</p>
                </figure>
                <form autocomplete="off" action="{{ route('auth_reg_process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="file_upload border border-white">
                            <input name="avatar" type="file">
                            <i class="bi bi-file-earmark-arrow-up"></i>
                            <div>PNG, JPG, WEBP</div>
                            <div>Max 2MB, Min 100x100</div>
                        </div>
                    </div>

                    @error('name')
                    <div class="text-center add_top_10 alert-danger text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input name="name" class="form-control" type="text" placeholder="Username">
                    </div>

                    @error('email')
                    <div class="text-center add_top_10 alert-danger text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input name="email" class="form-control" type="email" placeholder="Email">
                    </div>

                    @error('password')
                    <div class="text-center add_top_10 alert-danger text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input name="password" class="form-control" type="password" id="password1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input name="password_confirmation" class="form-control" type="password" id="password2" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <input name="telegram" class="form-control" type="text" placeholder="@Telegram">
                    </div>

                    <div id="pass-info" class="clearfix"></div>
                    <button type="submit" class="btn_1 rounded full-width">Register Now!</button>
                    <div class="text-center add_top_10">Already have an acccount? <strong><a href="{{ route('auth_login') }}">Sign In</a></strong></div>
                </form>
            </aside>
        </div>
    </div>
@endsection

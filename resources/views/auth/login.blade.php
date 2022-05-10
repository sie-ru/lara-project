@extends('base.base')
@section('title', 'Sing In')
@section('page_type', 'auth')

@section('body')
    <div id="login_bg">
        <div id="login" >
            <aside>
                <figure>
                    <p class="h4">Microblog.</p>
                    <p>Sing In</p>
                    @error('login_error')
                    <div class="text-center add_top_10 alert-danger text-danger fw-bolder">{{ $message }}</div>
                    @enderror
                </figure>

                @if(\Illuminate\Support\Facades\Session::has('registration_success'))
                    <div class="text-center add_top_10 alert-primary text-black fw-normal">{{ \Illuminate\Support\Facades\Session::get('registration_success') }}</div>
                @endif

                <form action="{{ route('auth_login_process') }}" method="POST">
                    @csrf
                    @error('email')
                    <div class="text-center add_top_10 alert-danger text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-3">
                        <input name="email" type="email" class="form-control"  id="email" placeholder="Email">
                    </div>

                    @error('password')
                    <div class="text-center add_top_10 alert-danger text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input name="password" type="password" class="form-control"  id="password" value="" placeholder="Password">
                    </div>

                    <div class="clearfix add_bottom_30">
                        <div class="float-end"><a id="forgot" href="">Forgot Password?</a></div>
                    </div>
                    <button type="submit" class="btn_1 full-width">Login</button>
                    <div class="text-center add_top_10">Don't have an account? <strong><a href="{{ route('auth_reg') }}">Sign up!</a></strong></div>


                </form>
            </aside>
        </div>
    </div>

@endsection

@extends('base.base')
@section('title', 'Reset password')
@section('body')
    <div id="register_bg">
        <div id="login">
            <aside>
                <figure>
                    <p class="h4">Microblog.</p>
                    <p>Reset a password</p>
                </figure>
                <form autocomplete="off">
                    <div class="form-group mb-3">
                        <input name="email" class="form-control" type="email" placeholder="Email">
                    </div>
                    <div id="pass-info" class="clearfix"></div>
                    <button href="#0" class="btn_1 rounded full-width">Send</button>
                </form>
            </aside>
        </div>
    </div>
@endsection

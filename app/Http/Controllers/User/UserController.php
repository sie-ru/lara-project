<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UserController extends Controller
{
    public function __invoke($user_id) {
        return view('user.profile', [
            'posts' => Post::where('user_id', $user_id)->get()
        ]);
    }
}

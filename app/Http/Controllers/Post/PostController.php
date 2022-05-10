<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function __invoke($post_id)
    {
        return view('post.post', [
            'post' => Post::where('id', $post_id)->orderBy('created_at', 'DESC')->with(['tags', 'user'])->first(),
            'comments' => Comment::where('post_id', $post_id)->orderBy('created_at', 'DESC')->with('user')->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use App\Http\Requests\CreatePostRequest;
use App\Jobs\CreatePostJob;

class CreatePostController extends Controller
{
    public function __invoke()
    {
        return view('post.create_post');
    }

    public function upload(CreatePostRequest $request, PostService $service)
    {
        $data = $request->validated();

        if($request->has('cover')) {
            $cover = str_replace('public/post_covers', '', $request->file('cover')->store('public/post_covers'));
            $data['cover'] = $cover;
        }

        if($this->dispatch(new CreatePostJob($data))) {
            return redirect(route('user_profile', auth('web')->user()->id))->with(['post_create_success' => 'Post successfully created']);
        }

        return redirect(route('post_create'))->withErrors(['post_create' => 'Post create error']);
    }
}

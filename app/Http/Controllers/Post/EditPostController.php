<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;

class EditPostController extends Controller
{
    public function __invoke($post_id)
    {
        return view('post.edit_post', [
            'post' => Post::where('id', $post_id)->with(['tags', 'user'])->first()
        ]);
    }

    public function edit(EditPostRequest $request, PostService $service, $post_id)
    {
        $data = $request->validated();
//        dd($data);
        if($request->has('cover')) {
            $cover = str_replace('public/post_covers', '', $request->file('cover')->store('public/post_covers'));
            $data['cover'] = $cover;
        }

        if($service->update($data, $post_id)) {
            return redirect(route('user_profile', auth('web')->user()->id))->with(['post_create_success' => 'Post successfully created']);
        }

        return redirect(route('post_create'))->withErrors(['post_create' => 'Post create error']);
    }
}

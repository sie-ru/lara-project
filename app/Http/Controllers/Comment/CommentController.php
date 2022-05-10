<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Services\CommentService;
use App\Jobs\CreateCommentJob;

class CommentController extends Controller
{
    public function __invoke(CommentRequest $request, CommentService $service, $post_id)
    {
        $data = $request->validated();

        if($this->dispatch(new CreateCommentJob($data, $post_id))) {
            return redirect(route('post', $post_id))->with(['comment_add_success' => 'Comment added']);
        }

        return redirect()->back()->withErrors(['comment_add_error' => 'Comment not added']);
    }
}

<?php

namespace App\Http\Services;

use App\Models\Comment;

class CommentService
{
    public function add(array $data, int $post_id)
    {
        $comment = Comment::create([
            'comment' => $data['comment'],
            'user_id' => $data['user_id'],
            'post_id' => $post_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if($comment) {
            return true;
        }

        return false;
    }
}

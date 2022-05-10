<?php

namespace App\Http\Services;

use App\Models\Post;
use App\Models\Tag;

class PostService
{
    public function create(array $data) : bool
    {
        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'preview' => $data['preview'],
            'user_id' => $data['user_id'],
            'comments_available' => $data['comments_available'] === 'on' ? true : false,
            'cover' => $data['cover']
        ]);

        foreach ($data['tags'] as $tag) {
            Tag::create([
                'post_id' => $post->id,
                'tag' => $tag
            ]);
        }

        if($post) {
            return true;
        }

        return false;
    }

    public function update(array $data, int $post_id) : bool
    {
        $post = Post::findOrFail($post_id)->update($data);


        if ($post) {
            return true;
        }

        return false;
    }

    public function delete(int $post_id) : bool
    {
        $post = Post::findOrFail($post_id)->delete();

        if($post) {
            return true;
        }

        return false;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    private Post $posts;
    private Tag $tags;

    public function __construct(Post $postModel, Tag $tagModel)
    {
        $this->posts = $postModel;
        $this->tags = $tagModel;
    }

    public function __invoke()
    {
        return view('feed.feed', [
            'posts' => $this->posts->getPostsList(),
            'tags' => $this->tags->getAllTags()
        ]);
    }

    public function searchByQuery(Request $request)
    {
        $query = $request->search;

        return view('feed.feed', [
            'posts' => $this->posts->getPostsBySearchQuery($query),
            'tags' => $this->tags->getAllTags()
        ]);
    }

    public function searchByTag($tag)
    {
        return view('feed.feed', [
            'posts' => $this->posts->getPostsByTag($tag),
            'tags' => $this->tags->getAllTags()
        ]);
    }
}

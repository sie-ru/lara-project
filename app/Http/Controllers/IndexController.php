<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private Post $posts;
    private User $users;

    public function __construct(Post $postModel, User $userModel)
    {
        $this->posts = $postModel;
        $this->users = $userModel;
    }

    public function index()
    {
        return view('index.index', [
            'posts' => $this->posts->getPostsList(),
            'authors' => $this->users->getAuthorData()
        ]);
    }

}

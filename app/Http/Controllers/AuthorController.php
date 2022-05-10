<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private User $users;

    public function __construct(User $userModel)
    {
        $this->users = $userModel;
    }

    public function __invoke($author_id)
    {
        return view('author.author', [
            'author' => $this->users->getAuthorDataById($author_id),
        ]);
    }


}

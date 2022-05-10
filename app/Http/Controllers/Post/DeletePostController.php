<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    public function __invoke(PostService $service, $post_id)
    {
        if($service->delete($post_id)) {
            return redirect()->back();
        }
    }
}

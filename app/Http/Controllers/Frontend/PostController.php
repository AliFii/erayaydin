<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view("frontend.post.index", [
            "posts" => Post::orderBy("created_at", "DESC")->paginate(5)
        ]);
    }

    public function show(Post $post)
    {
        return view("frontend.post.show", [
            "post" => $post,
        ]);
    }
}

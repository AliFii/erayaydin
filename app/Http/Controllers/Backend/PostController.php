<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view("backend.post.index", [
            "posts" => $posts,
        ]);
    }

    public function create()
    {
        return view("backend.post.create");
    }

    public function store(PostCreateRequest $request)
    {
        $post           = new Post;
        $post->name     = $request->get("name");
        $post->slug     = $request->get("slug");
        $post->subtitle = $request->get("subtitle");
        $post->content  = $request->get("content");

        if($request->hasFile("image")){
            do {
                $filename = $post->slug."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            } while(\File::exists(public_path()."/upload/post/".$filename));
            $request->file("image")->move(public_path()."/upload/post", $filename);
            $post->image = "upload/post/".$filename;
        }

        $post->save();

        return redirect()->route("backend.post.edit", $post->slug);
    }

    public function edit(Post $post)
    {
        return view("backend.post.edit", [
            "post" => $post,
        ]);
    }

    public function update(PostEditRequest $request, Post $post)
    {
        $post->name     = $request->get("name");
        $post->slug     = $request->get("slug");
        $post->subtitle = $request->get("subtitle");
        $post->content  = $request->get("content");

        if($request->hasFile("image")){
            if($post->image && \File::exists(public_path()."/".$post->image))
                \File::delete(public_path()."/".$post->image);
            do {
                $filename = $post->slug."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            } while(\File::exists(public_path()."/upload/post/".$filename));
            $request->file("image")->move(public_path()."/upload/post", $filename);
            $post->image = "upload/post/".$filename;
        }

        $post->save();

        return redirect()->route("backend.post.edit", $post->slug);
    }

    public function destroy(Post $post)
    {
        if($post->image && \File::exists(public_path()."/".$post->image))
            \File::delete(public_path()."/".$post->image);
        $post->delete();

        return redirect()->route("backend.post.index");
    }
}

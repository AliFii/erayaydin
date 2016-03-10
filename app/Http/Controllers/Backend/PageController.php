<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageEditRequest;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(20);
        return view("backend.page.index", [
            "pages" => $pages,
        ]);
    }

    public function create()
    {
        return view("backend.page.create");
    }

    public function store(PageCreateRequest $request)
    {
        $page           = new Page;
        $page->name     = $request->get("name");
        $page->slug     = $request->get("slug");
        $page->subtitle = $request->get("subtitle");
        $page->content  = $request->get("content");

        if($request->hasFile("image")){
            do {
                $filename = $page->slug."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            } while(\File::exists(public_path()."/upload/page/".$filename));
            $request->file("image")->move(public_path()."/upload/page", $filename);
            $page->image = "upload/page/".$filename;
        }

        $page->save();

        return redirect()->route("backend.page.edit", $page->slug);
    }

    public function edit(Page $page)
    {
        return view("backend.page.edit", [
            "page" => $page,
        ]);
    }

    public function update(PageEditRequest $request, Page $page)
    {
        $page->name     = $request->get("name");
        $page->slug     = $request->get("slug");
        $page->subtitle = $request->get("subtitle");
        $page->content  = $request->get("content");

        if($request->hasFile("image")){
            if($page->image && \File::exists(public_path()."/".$page->image))
                \File::delete(public_path()."/".$page->image);
            do {
                $filename = $page->slug."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            } while(\File::exists(public_path()."/upload/page/".$filename));
            $request->file("image")->move(public_path()."/upload/page", $filename);
            $page->image = "upload/page/".$filename;
        }

        $page->save();

        return redirect()->route("backend.page.edit", $page->slug);
    }

    public function destroy(Page $page)
    {
        if($page->image && \File::exists(public_path()."/".$page->image))
            \File::delete(public_path()."/".$page->image);
        $page->delete();

        return redirect()->route("backend.page.index");
    }
}

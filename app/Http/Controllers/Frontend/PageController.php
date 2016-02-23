<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    public function show(Page $page)
    {
        return view("frontend.page.show", [
            "page" => $page,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    public function login()
    {
        return view("backend.user.login");
    }

    public function doLogin(UserLoginRequest $request)
    {
        if(auth()->attempt(["email" => $request->get("email"), "password" => $request->get("password")], $request->has("remember")))
            return redirect()->route("backend.dashboard.index");
        else
            return redirect()->route("backend.user.login")->withErrors(["email" => "E-Posta veya şifre hatalı!"])->withInput();
    }
}

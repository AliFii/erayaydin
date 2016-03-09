<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

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

    public function logout()
    {
        auth()->logout();
        return redirect()->route("backend.user.login");
    }

    public function index()
    {
        $users = User::orderBy("created_at", "ASC")->paginate(20);
        return view("backend.user.index", [
            "users" => $users,
        ]);
    }

    public function create()
    {
        return view("backend.user.create");
    }

    public function store(UserCreateRequest $request)
    {
        $user = new User;
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->password = bcrypt($request->get("password"));
        $user->save();

        return redirect()->route("backend.user.index");
    }

    public function edit(User $user)
    {
        return view("backend.user.edit", [
            "user" => $user,
        ]);
    }

    public function update(UserEditRequest $request, User $user)
    {
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        if($request->has("password"))
            $user->password = bcrypt($request->get("password"));
        $user->save();

        return redirect()->route("backend.user.edit", $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route("backend.user.index");
    }
}

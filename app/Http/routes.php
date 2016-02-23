<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::bind("post", function($value, $route) {
    return \App\Post::where("slug", $value)->first();
});

Route::bind("page", function($value, $route) {
    return \App\Page::where("slug", $value)->first();
});

Route::group(['middleware' => ['web']], function () {

    Route::group(["as" => "frontend.", "namespace" => "Frontend"], function() {
        Route::get("/", ["as" => "post.index", "uses" => "PostController@index"]);

        Route::get("post/{post}", ["as" => "post.show", "uses" => "PostController@show"]);

        Route::get("page/{page}", ["as" => "page.show", "uses" => "PageController@show"]);
    });

    Route::group(["as" => "backend.", "namespace" => "Backend", "prefix" => config("app.backend")], function(){

        Route::get("/", ["as" => "dashboard.index", "uses" => "DashboardController@index"]);

        Route::get("post", ["as" => "post.index", "uses" => "PostController@index"]);
        Route::get("post/create", ["as" => "post.create", "uses" => "PostController@create"]);
        Route::post("post", ["as" => "post.store", "uses" => "PostController@store"]);
        Route::get("post/{post}/edit", ["as" => "post.edit", "uses" => "PostController@edit"]);
        Route::put("post/{post}", ["as" => "post.update", "uses" => "PostController@update"]);
        Route::get("post/{post}/delete", ["as" => "post.destroy", "uses" => "PostController@destroy"]);

        Route::get("page", ["as" => "page.index", "uses" => "PageController@index"]);
        Route::get("page/create", ["as" => "page.create", "uses" => "PageController@create"]);
        Route::post("page", ["as" => "page.store", "uses" => "PageController@store"]);
        Route::get("page/{page}/edit", ["as" => "page.edit", "uses" => "PageController@edit"]);
        Route::put("page/{page}", ["as" => "page.update", "uses" => "PageController@update"]);
        Route::get("page/{page}/delete", ["as" => "page.destroy", "uses" => "PageController@destroy"]);

    });
});

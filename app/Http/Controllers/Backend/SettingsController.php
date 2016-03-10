<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsUpdateRequest;

class SettingsController extends Controller
{
    public function edit()
    {
        return view("backend.settings.edit");
    }

    public function update(SettingsUpdateRequest $request)
    {
        \Settings::setData([
            'site_name'        => $request->get("site_name"),
            'site_subtitle'    => $request->get("site_subtitle"),
            'site_description' => $request->get("site_description"),
            'social_twitter'   => $request->get("social_twitter"),
            'social_facebook'  => $request->get("social_facebook"),
            'social_github'    => $request->get("social_github")
        ]);
        \Settings::save();

        return redirect()->route("backend.settings.edit");
    }
}

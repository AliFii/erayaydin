<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsUpdateRequest;
use \File;

class SettingsController extends Controller
{
    public function edit()
    {
        return view("backend.settings.edit");
    }

    public function update(SettingsUpdateRequest $request)
    {
        $settings = [
            'site_name'        => $request->get("site_name"),
            'site_subtitle'    => $request->get("site_subtitle"),
            'site_description' => $request->get("site_description"),
            'social_twitter'   => $request->get("social_twitter"),
            'social_facebook'  => $request->get("social_facebook"),
            'social_github'    => $request->get("social_github")
        ];

        if($request->hasFile("site_image")){
            if(\Settings::get("site_image")){
                if(File::exists(public_path()."/".\Settings::get("site_image")))
                    File::delete(public_path()."/".\Settings::get("site_image"));
            }
            do {
                $filename = str_slug($request->get("site_name"))."-".str_random(3).".".$request->file("site_image")->getClientOriginalExtension();
            } while(File::exists(public_path()."/upload/site-image/".$filename));
            $request->file("site_image")->move(public_path()."/upload/site-image", $filename);
            $settings["site_image"] = "upload/site-image/".$filename;
        }
        \Settings::setData($settings);

        return redirect()->route("backend.settings.edit");
    }
}

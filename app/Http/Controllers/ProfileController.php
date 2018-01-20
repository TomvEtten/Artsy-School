<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a profile page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $currentProfile = Profile::where("user_id", $id)->first();
        $title = $currentProfile->name . " " . $currentProfile->surname;
        return view('pages.profile')->with("title", $title)->with("profile", $currentProfile);
    }
}

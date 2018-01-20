<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Research";
        $researches = Research::orderBy('id', 'desc')->simplePaginate(6);
        return view('pages.research')->with("title", $title)->with("researches", $researches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
          $title = "Upload Research";
          $schools = School::all();
        return view('pages.upload')->with("title", $title)->with("schools", $schools);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       $this->validate($request, [
           'name' => 'required|size:45',
           'surname' => 'required|size:45',
           'biography' => 'required|size:2000',
           'school' => 'required',
           'birth' => 'required' //TODO datecheck?
           //'image_url' => new IsURLImageRef()
       ]);
       
       $research = new Research;
       $research->title = $request->input('title');
       $research->summary = $request->input('summary');
       $research->content = $request->input('content');
       $research->type = $request->input('type');
       $research->user_id = Auth::user()->id;
       $research->image_url = $request->input('image_url');
       $research->save();
       
       return redirect('/research')->with('success', 'Research Created');
       
    }

    /**
     * Display a page to edit your own profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $currentProfile = Profile::where("user_id", $id)->first();
        return view('pages.edit_profile')->with("title", "Edit Profile")->with("profile", $currentProfile);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\Rules\IsURLImageRef;
use App\User;
use App\School;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
            'title' => 'required',
            'content' => 'required',
            'summary' => 'required',
            'image_url' => new IsURLImageRef()
        ]);

        $research = new Research;
        $research->title = $request->input('title');
        $research->summary = $request->input('summary');
        $research->content = $request->input('content');
        $research->type = $request->input('type');
        $research->user_id = Auth::user()->id;
        $research->image_url = $request->input('image_url');
        $research->youtube_url = $request->input('youtube_url');
        $research->save();

        $id = $research->id;

        return redirect('/research/' . $id)->with('success', 'Research Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $research = Research::find($id);
        $title = $research->title;
        return view('pages.research_show')->with("title", $title)->with("research", $research);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $research = Research::find($id);
        $title = $research->title . ' Edit';
        return view('pages.editResearch')->with("title", $title)->with("research", $research);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'summary' => 'required',
            'image_url' => new IsURLImageRef()
        ]);

        $research = Research::find($id);
        $research->title = $request->input('title');
        $research->summary = $request->input('summary');
        $research->content = $request->input('content');
        $research->type = $request->input('type');
        $research->user_id = Auth::user()->id;
        $research->image_url = $request->input('image_url');
        $research->save();

        return redirect('/research/' . $id)->with('success', 'Research Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}

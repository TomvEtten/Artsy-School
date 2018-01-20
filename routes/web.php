<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/projectinfo', function () {
    $title = "Project Info";
    return view('pages.projectinfo')->with("title", $title);
});

//Research pages
Route::resource('/', 'ResearchController');
Route::resource('/research', 'ResearchController');
Route::resource('/comment', 'CommentController');

//Profile pages
Route::resource('/profile', 'ProfileController');
Route::resource('/edit_profile', 'EditProfileController');

Auth::routes();


// likes
Route::post('Profile/like', '/LikeController@like');
Route::get('Profile/like', '/LikeController@like');
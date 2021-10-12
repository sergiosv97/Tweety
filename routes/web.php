<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::post('/profiles/{user:username}/follow','FollowsController@store')->name('follow');
    Route::get(
        '/profiles/{user:username}/edit',
        'ProfilesController@edit'
    )->middleware('can:edit,user');

    Route::patch(
        '/profiles/{user:username}',
        'ProfilesController@update'
    )->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController');

    //Route :: get ('file-upload', 'FileUploadController @ fileUpload') -> nombre ('file.upload');
    //Route :: post ('file-upload', 'FileUploadController @ fileUploadPost') -> nombre ('file.upload.post');
});

Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');



// en sidebar links dentro de profile

//@foreach (auth()->user()->follows as $user)
//@endforeach 
Auth::routes();
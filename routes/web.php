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

Route::get('/', function () {
    return view('threads.index');
});

Route::get('/threads/{id}', function ($id) {
    $result = \App\Thread::FindOrFail($id);
    return view('threads.view', compact('result'));
});

Route::get('/locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return back();
});

Route::get('/threads','ThreadController@index');
Route::get('/replies/{id}','ReplyController@show');

Route::get('/login/{provider}','SocialauthController@redirect');
Route::get('/login/{provider}/callback','SocialauthController@callback');


Route::middleware(['auth'])->group(function(){

    Route::post('/threads','ThreadController@store');
    Route::put('/threads/{thread}','ThreadController@update');
    Route::get('/threads/{thread}/edit',function (\App\Thread $thread) {
        return view('threads.edit', compact('thread'));
    });

    Route::get('/reply/higthligth/{id}','ReplyController@higthligth');
    Route::get('/thread/pin/{thread}','ThreadController@pin');
    Route::get('/thread/close/{thread}','ThreadController@close');

    Route::get('/profile','ProfileController@edit');
    Route::post('/profile','ProfileController@update');

    Route::post('/replies','ReplyController@store');
});

Auth::routes();


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostsController');

// Links
// Route::group(['prefix' => 'links'], function() {
//     Route::get('create', 'LinksController@create');
//     Route::post('create', 'LinksController@store');
//     Route::get('f/{id}', 'LinksController@follow')->where('id', '[0-9]+');
// });

// Auto REST routes
Route::resource('link', 'LinksController', ['only' => ['create', 'store']]);
// Route::get('r/{id}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('id', '[0-9]+');
Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link', '[0-9]+');

// Tinkering

Route::group(['prefix' => 'group', 'middleware' => 'ip'], function() {
    Route::get('/salut/{slug}-{id}', ['as' => 'salut', function ($slug, $id) {
        return "Slug: $slug, Id: $id, Route: " . route('salut', ['slug' => $slug, 'id' => $id]);
    }])->where('slug','[a-z0-9\-]+')->where('id', '[0-9]+');
});

//Route::get('/monIp', 'Ip@index');

Route::get('/about', ['as' => 'about', 'uses' => 'PageController@about']);




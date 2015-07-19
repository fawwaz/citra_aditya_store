<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/hello', function()
{
	return View::make('hello');
});

Route::get('dashboard', function() {
	return View::make('sessions/user');
})->before('auth');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');


// Mesti di protect harus auth dulu
Route::resource('categories', 'CategoriesController');
Route::resource('authors', 'AuthorsController');
Route::resource('books', 'BooksController');


Route::get('/',function(){
	return View::make('front.home');
});

Route::get('/explore/category/{id}','ExploreController@byCategory');
Route::get('/explore/author/{id}','ExploreController@byAuthor');
Route::get('/explore/search/{query}','ExploreController@bySearch');


Route::resource('carts','CartsController');
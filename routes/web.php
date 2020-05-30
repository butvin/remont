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


Auth::routes();

//Route::view('/', 'frontpage'); // => works

Route::get('/', 'FrontPageController@index')->name('frontpage');

Route::resource('services', 'ServiceSubjectController');
//Route::get('/services/create', 'ServiceSubjectController@create');


Route::get('deactivate', 'ServiceSubjectController@deactivate')
    ->name('deactivate');

Route::get('servicesImport', 'ServiceSubjectController@import')
    ->name('import');

Route::get('/home', 'HomeController@index')->name('home');

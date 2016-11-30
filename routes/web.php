<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/new_chart','Chart\ChartController@index');
Route::post('/new_chart','Chart\ChartController@postNewChart');

Route::get('chart/{chart_id}','Chart\ShowChartController@index');
Route::get('/category','CategoryController@index');

Route::get('/profile','ProfileController@index');

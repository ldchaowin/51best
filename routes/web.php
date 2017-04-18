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


Route::get('/chart/{chart_id}','Chart\ShowChartController@index');
Route::get('/chart_like','Chart\ShowChartController@postLikeChart');
Route::get('/chart/{chart_id}/addItem','Chart\ShowChartController@addItemShow')->middleware('auth');
Route::post('/chart/{chart_id}/addItem','Chart\ShowChartController@addItem');

Route::get('/chart/{chart_id}/{item_id}','Chart\ShowChartController@itemDetail');


Route::get('/category','CategoryController@index');

Route::get('/profile','ProfileController@index');
Route::get('/profile/myChart','ProfileController@myChart');
Route::get('/profile/myItem','ProfileController@myItem');
Route::get('/profile/myLike','ProfileController@myLike');

Route::get('/security','Auth\LoginedResetPassController@index');
Route::post('/security','Auth\LoginedResetPassController@resetPassword');




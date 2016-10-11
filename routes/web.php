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

Route::get('/', ['as' => 'index_path', 'uses' => 'PageController@index']);
Route::get('readme', ['as' => 'readme_path', 'uses' => 'PageController@readme']);
Route::get('installation', ['as' => 'installation_path', 'uses' => 'PageController@installation']);
Route::get('instructions', ['as' => 'instructions_path', 'uses' => 'PageController@instructions']);
Route::get('report', ['as' => 'report_path', 'uses' => 'PageController@report']);



Route::get('news', ['as' => 'news_index_path', 'uses' => 'ArticleController@index']);
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// The route below isn't being used. I played around with the idea of loading each article as a Vue Component
// but due to time constraints I thought I should keep things simple and stick to good old simple pagination
// Route::get('articles', function () {
//     $articles = App\Article::latest('published_at')->paginate(5);
//
//     return response()->json(['articles' => $articles]);
// });

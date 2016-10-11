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

Route::get('/', ['as' => 'index_path', 'uses' => function () {
    return view('welcome');
}]);

Route::get('news', ['as' => 'news_index_path', 'uses' => function () {
    $articles = App\Article::latest('published_at')->simplePaginate(5);

    return view('news')->with('articles', $articles);
}]);

Route::get('setup', function() {
    $firstArticle = factory(App\Article::class)->create([
        'link' => 'http://example.com/1',
        'title' => 'City A.M. First Article',
        'description' => 'This is the body of the first article.',
        'published_at' => \Carbon\Carbon::yesterday()->subDay()
    ]);

    $nextFourArticles = factory(App\Article::class, 4)->create([
        'published_at' => \Carbon\Carbon::yesterday()
    ]);

    $sixthArticle = factory(App\Article::class)->create([
        'link' => 'http://example.com/6',
        'title' => 'City A.M. Sixth Article',
        'description' => 'This is the body of the sixth article.',
        'published_at' => \Carbon\Carbon::now()
    ]);

    return 'set up';
});
<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('published_at')->simplePaginate(5);

        return view('news')->with('articles', $articles);
    }
}

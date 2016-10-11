<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = App\Article::latest('published_at')->simplePaginate(5);

        return view('news')->with('articles', $articles);
    }
}

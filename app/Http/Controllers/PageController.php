<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function readme()
    {
        return view('pages.readme');
    }

    public function installation()
    {
        return view('pages.installation');
    }

    public function instructions()
    {
        return view('pages.instructions');
    }

    public function report()
    {
        return view('pages.report');
    }
}

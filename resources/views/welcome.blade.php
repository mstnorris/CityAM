@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="card-columns">
                    <a class="card card-inverse card-primary text-xs-center" href="{{ route('news_index_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/news</h1>
                            <p class="card-text">View the paginated news articles. This is set to 5 by default. See 'app/Http/Controllers/ArticleController.php'.</p>
                        </div>
                    </a>
                    <a class="card card-inverse card-success text-xs-center" href="{{ route('index_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/</h1>
                            <p class="card-text">This page.</p>
                        </div>
                    </a>
                    <a class="card card-inverse card-warning text-xs-center" href="{{ route('readme_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/readme</h1>
                            <p class="card-text">Displays the formatted repository Readme.</p>
                        </div>
                    </a>
                    <a class="card card-inverse card-info text-xs-center" href="{{ route('installation_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/installation</h1>
                            <p class="card-text">Shows the installation page. If you can read this. You've already made
                                it.</p>
                        </div>
                    </a>
                    <a class="card card-inverse card-danger text-xs-center" href="{{ route('instructions_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/instructions</h1>
                            <p class="card-text">You know what you're doing.</p>
                        </div>
                    </a>
                    <a class="card card-inverse card-primary text-xs-center" href="{{ route('report_path') }}">
                        <div class="card-block">
                            <h1 class="card-title display-4">/report</h1>
                            <p class="card-text">A quick report about my work.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
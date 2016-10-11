@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="display-4">Instructions</h1>

                <h2>Artisan Command</h2>

                <p class="lead">The command takes in an optional argument called 'feed' in the shape of a URL (the location of the City A.M. RSS Feed you wish to parse - by default it is the provided news.xml, but it does work with your others too should you wish).</p>

                <p><code>php artisan rss:parse</code></p>

                <p><code>Reads the specified City A.M. RSS feed and stores the data</code></p>

                <h2>Routes</h2>

                <h4>/news</h4>

                <p class="lead">View the paginated news articles. This is set to 5 by default. See 'app/Http/Controllers/ArticleController.php'.</p>

                <h4>/</h4>

                <p class="lead">Displays the welcome page.</p>

                <h4>/readme</h4>

                <p class="lead">Displays the formatted repository Readme.</p>

                <h4>/installation</h4>

                <p class="lead">Displays the installation instructions. I guess if you're reading this in the browser then you've got it working already!</p>

                <h4>/instructions</h4>

                <p class="lead">It's this file.</p>

                <h4>/report</h4>

                <p class="lead">Displays a little report about my work.</p>

                <h2>Tests</h2>

                <p class="lead">Run <code>phpunit</code> to run the tests.</p>

            </div>
        </div>
    </div>

@endsection
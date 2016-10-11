@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="display-4">Installation</h1>

                <p class="lead">I hope I haven't forgotten any steps, no doubt I've missed one or two. But here goes...</p>

                <ol>
                    <li>
                        <p class="lead">Clone this repository</p>
                        <p><code>git clone https://github.com/mstnorris/CityAM cityam</code></p>
                    </li>
                    <li>
                        <p class="lead">Install dependencies</p>
                        <p><code>composer install</code></p>
                        <p><code>npm install</code></p>
                    </li>
                    <li>
                        <p class="lead">Compile Assets</p>
                        <p><code>gulp</code></p>
                    </li>
                    <li>
                        <p class="lead">Create an environment file and edit your database setup</p>
                        <p><code>cp .env.example .env</code></p>
                        <p><pre><code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cityam
DB_USERNAME=username
DB_PASSWORD=password
                            </code></pre></p>
                    </li>
                    <li>
                        <p class="lead">Generate Application Key</p>
                        <p><code>php artisan key:generate</code></p>
                    </li>
                    <li>
                        <p class="lead">Run the database migrations</p>
                        <p><code>php artisan migrate</code></p>
                    </li>
                    <li>
                        <p class="lead">Set up the scheduler to run cron jobs</p>
                    </li>
                    <li>
                        <p class="lead">Edit your <code>/etc/hosts</code> file and re-provision your local server</p>
                    </li>
                    <li>
                        <p class="lead">Visit the domain you provided in the above step in your browser and access the <strong>/news</strong> route</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

@endsection
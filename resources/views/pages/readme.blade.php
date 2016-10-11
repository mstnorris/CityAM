@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="display-4">Readme</h1>

                <img src="/images/screenshot.png" alt="Screenshot" class="img-fluid img-screenshot">

                <h2>Overview</h2>

                <p class="lead">
                    This technical test is intended to test your ability to structure code, process data, and present it.
                </p>
                <p class="lead">
                    We are looking for:
                </p>
                <ol>
                    <li>Well structured, testable, commented code</li>
                    <li>Accompanying automated tests</li>
                    <li>Use of the correct tools for specific tasks</li>
                </ol>
                <h2>Task</h2>
                <p class="lead">
                    Using best practices, build a Laravel application that reads an RSS feed, stores the data, and presents this to the user.
                </p>
                <ul>
                    <li>You should use the latest version of Laravel</li>
                    <li>The RSS feed to use is: <a href="http://www.cityam.com/feeds/sections/news.xml">http://www.cityam.com/feeds/sections/news.xml</a></li>
                    <li>You should write an Artisan command to store the RSS feed items in the database, using your choice of database structure</li>
                    <li>You should include a route “/news” in your application that will display these items. Use Bootstrap to apply some basic styling to this page</li>
                </ul>
                <p class="lead">Whilst we use Vagrant to set up local environments, for this test it is acceptable to skip this and use a locally installed LAMP stack or Homestead VM. Please provide the source code archived in a zip/tar file, or hosted on a public VCS such as GitHub.</p>

            </div>
        </div>
    </div>

@endsection
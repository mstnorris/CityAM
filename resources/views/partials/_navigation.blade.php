<div class="navbar navbar-dark navbar-fixed-top" style="background-color: #0088c3;" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index_path') }}">City A.M.</a>
        <div class="nav navbar-nav">
            <a class="nav-item nav-link {{ active_class(if_route('index_path')) }}" href="{{ route('index_path') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link {{ active_class(if_route('news_index_path')) }}" href="{{ route('news_index_path') }}">News</a>
        </div>
    </div>
</div>
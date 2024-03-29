<div class="navbar navbar-dark navbar-fixed-top" style="background-color: #0088c3;" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index_path') }}">City A.M.</a>
        <div class="nav navbar-nav">
            <a class="nav-item nav-link {{ active_class(if_route('index_path')) }}" href="{{ route('index_path') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link {{ active_class(if_route('news_index_path')) }}" href="{{ route('news_index_path') }}">News</a>
        </div>
        <div class="nav navbar-nav pull-xs-right">
            <div class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       role="button"
                       href="#"
                    >Documentation</a>
                    <div class="dropdown-menu dropdown-menu-right"
                         role="menu"
                    >
                        <a href="{{ route('readme_path') }}"
                           class="dropdown-item">
                            Readme
                        </a>
                        <a href="{{ route('installation_path') }}"
                           class="dropdown-item">
                            Installation
                        </a>
                        <a href="{{ route('instructions_path') }}"
                           class="dropdown-item">
                            Instructions
                        </a>
                        <a href="{{ route('report_path') }}"
                           class="dropdown-item">
                            Report
                        </a>
                        <a href="/sql/city_am_sql_dump.sql"
                           class="dropdown-item">
                            Download SQL Dump
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
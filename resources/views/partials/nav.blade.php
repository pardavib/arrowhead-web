<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Arrowhead
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/connect') }}"><i class="fa fa-btn fa-database"></i>Connect</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View logs <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/logs/a') }}"><i class="fa fa-btn fa-list"></i>Cloud A logs</a></li>
                        <li><a href="{{ url('/logs/b') }}"><i class="fa fa-btn fa-list"></i>Cloud B logs</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/messages') }}"><i class="fa fa-btn fa-exchange"></i>View messages</a></li>
                <li><a href="{{ url('/commands') }}"><i class="fa fa-btn fa-terminal"></i>Commands</a></li>
                <li><a href="{{ url('/utilities') }}"><i class="fa fa-btn fa-cogs"></i>Utilities</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if(Session::has('databaseA') && Session::has('addressA'))
                    <p class="navbar-text connected">Cloud A: {{Session::get('databaseA')}}{{'@'.Session::get('addressA')}}:3306</p>
                @else
                    <p class="navbar-text disconnected">Cloud A: not connected</p>
                @endif
                @if(Session::has('databaseB') && Session::has('addressB'))
                    <p class="navbar-text connected">Cloud B: {{Session::get('databaseB')}}{{'@'.Session::get('addressB')}}:3306</p>
                @else
                    <p class="navbar-text disconnected">Cloud B: not connected</p>
                @endif
                @if((Session::has('databaseA') && Session::has('addressA'))||(Session::has('databaseB') && Session::has('addressB')))
                    <li><a href="{{ url('/disconnect') }}"><i class="fa fa-btn fa-remove"></i>Disconnect</a></li>
                @endif
                <li><a href="{{ url('/info') }}"><i class="fa fa-btn fa-info"></i>Info</a></li>
                <li><a href="{{ url('/help') }}"><i class="fa fa-btn fa-question-circle"></i>Help</a></li>
            </ul>
        </div>
    </div>
</nav>
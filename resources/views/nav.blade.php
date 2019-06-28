<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'MASIAS CMS') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">&nbsp;</ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                            
                @else
                            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        Projects <span class="caret"></span>
                    </a>
                              
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/projects') }}">Projects</a></li>
                        <li><a href="{{ url('/projects/create') }}">Create Project</a></li>
                        <li><a href="{{ url('/categories') }}">Categories</a></li>
                        <li><a href="{{ url('/categories/create') }}">Create Category</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        Jobs <span class="caret"></span>
                    </a>
                                
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                        <li><a href="{{ url('/jobs/create') }}">Create job</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        Pages <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/pages') }}">Pages</a></li>
                        <li><a href="{{ url('/pages/create') }}">Create page</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        Boxes <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/boxes') }}">Boxes</a></li>
                        <li><a href="{{ url('/boxes/create') }}">Create Box</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        Menus <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/menus') }}">Menu</a></li>
                        <li><a href="{{ url('/menus/create') }}">Create menu</a></li>
                    </ul>
                </li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            Galleries <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/menus') }}">Galleries</a></li>
                            <li><a href="{{ url('/menus/create') }}">Create Gallery</a></li>
                        </ul>
                    </li>


                <li class="dropdown" style="border-left: 1px solid #d3e0e9;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                                    
                        <li><a href="{{ route('home') }}">Dashboard</a></li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                                   
                        <li><a href="{{ route('register') }}">Add user</a></li>
                                    
                    </ul>

                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

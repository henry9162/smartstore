<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">                 
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>                       
            <a class="navbar-brand" href="/">SmartStore</a>
        </div>
        
        <div  class="collapse navbar-collapse nav-center"  id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-left" role="search" action="">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="search store, products...">
                    </div>
                    <button type="submit">Search</button>
            </form>
            
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Welcome back &nbsp; {{ Auth::user()->name }} <span class="caret"></span>
                    </a>                            
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('store.index', Auth::user()->id) }}">My Store</a></li>
                        <li><a href="{{ route('profile.index', Auth::user()->id) }}">Profile</a></li>
                        <li><a href="{{ route('store.admin') }}">Settings</a></li>
                        @if(Auth::user()->name == 'Felix Ekwonwa')
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('tags.index') }}">Tags</a></li>
                        <li><a href="{{ route('states.index') }}">Location</a></li>
                        <li role="separator" class="divider"></li>
                        @endif
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li> 
                @endif
                
                @if(!Auth::check())
                    <li><a href="{{ route('auth.register') }}">Register</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal2">Sign in</a></li>
                @endif
                @include('partials.signin_modal')
            </ul>
        </div><!-- /navbar collaspe --> 
    </div><!-- /navbar fluid -->
</nav><!-- end of navbar -->








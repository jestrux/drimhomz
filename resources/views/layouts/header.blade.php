<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container" style="padding-right: 20px; position: relative;">
        <div class="navbar-header" style="position: relative;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('images/drimhomzlogo.png')}}" alt="">
                <span id="logo">{{ config('app.name', 'Drimhomz') }}</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul id="mainNav" class="nav navbar-nav navbar-right">
                <?php
                    $isadmin = false;

                    if(!Auth::guest()){
                        if(Auth::user()->role == "admin")
                            $isadmin = true;
                    }
                ?>
                @if ($isadmin)
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                @endif
                
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/home') }}">Home</a></li>
                @endif
                
                <!-- <li><a href="about">About</a></li> -->
                <li><a href="{{ url('/shop') }}">Shop</a></li>
                <li><a href="{{ url('/expert') }}">Expert</a></li>
                <li><a href="{{ url('/advice') }}">Advice</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->full_name() }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?php
                                    $profileUrl = "/user/".Auth::user()->id;
                                ?>
                                <a href="{{ url($profileUrl) }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

        <div style="background-color: #fff; position: absolute; top: 0; width: 100%; height: 100%;">
            <form action="{{url('search/')}}" style=" width: 100%; height: 100%;" class="layout center">
                <input name="q" type="search" placeholder="Search" style="width: 250px; background: transparent; border: none; font-size: 25px; height: 100%;width: 100%; padding: 0 18px; outline: none; color: #000">
            </form>
        </div>
    </div>
</nav>
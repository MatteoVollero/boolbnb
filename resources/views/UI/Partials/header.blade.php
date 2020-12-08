<header>
    <div class="position_flex_header">
        <div class="wrapper">
            <div>
              <a href="{{route('home')}}"><img class="header_bnb_logo" src="{{asset('images/air_bnb_logo.png')}}" alt="logo_airbnb"></a>
            </div>
            <!-- Right Side Of Navbar -->
            <div class="links">
                <!-- Authentication Links -->
                @guest
                    <a class="link_header" href="{{ route('login') }}">
                        <i class="fas fa-user icn"></i> {{ __('Login') }}
                    </a>
                @if (Route::has('register'))
                    <a class="link_header" href="{{ route('register') }}">
                        <i class="fas fa-pen icn"></i> {{ __('Register') }}
                    </a>
                @endif
                @else
                    <li class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} 
                        <i class="fas fa-chevron-down icn"></i>
                        <ul class="dropdown_menu">
                            <li>
                                <a href="http://localhost:8000/admin/accomodations">Accomodations Area</a> 
                            </li>
                            <li>
                               <a href=>Message Area</a>
                            </li>
                        </ul>
                    </li>
                    <a class="link_header" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt icn"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
            <a href="#" class="hamburger_icn">
                <i class="fas fa-bars"></i>
            </a>  
            <div class="hamburger_menu">
                @guest
                <a class="link_header" href="{{ route('login') }}">
                    <i class="fas fa-user icn"></i> {{ __('Login') }}
                </a>
            @if (Route::has('register'))
                <a class="link_header" href="{{ route('register') }}">
                    <i class="fas fa-pen icn"></i> {{ __('Register') }}
                </a>
            @endif
            @else
                <a class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} 
                    <ul class="dropdown_menu">
                        <li class="list_item">
                            Accomodations Area
                        </li>
                        <li class="list_item">
                            Advertising Area
                        </li>
                        <li class="list_item">
                            Message Area
                        </li>
                    </ul>
                </a>
                <a class="link_header" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt icn"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
                <a href="#" class="cross_icn">
                    <i class="cross_icn fas fa-times"></i>
                </a>
            </div>
        </div>
    </div>
</header>
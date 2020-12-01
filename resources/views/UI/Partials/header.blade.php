<header>
    <div class="position_flex_header">
        <div class="wrapper">
            <div>
                <img class="header_bnb_logo" src="{{asset('images/air_bnb_logo.png')}}" alt="logo_airbnb">
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
                    <a class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} 
                        <i class="fas fa-chevron-down icn"></i>
                        <ul class="dropdown_menu">
                            <li  href="{{asset('admin/accomodations')}}" class="list_item">
                              Accomodations Area
                            </li>
                            <li class="list_item">
                                Advertising Area
                            </li>
                            <li class="list_item">
                                Message Area
                            </li>
                            <li class="list_item">
                               Homepage
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
            </div>
        </div>
    </div>
</header>
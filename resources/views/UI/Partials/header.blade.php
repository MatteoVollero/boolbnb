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
                        <i class="fas fa-user icn"></i> {{ ('Login') }}
                    </a>
                @if (Route::has('register'))
                    <a class="link_header" href="{{ route('register') }}">
                        <i class="fas fa-pen icn"></i> {{ ('Register') }}
                    </a>
                @endif
                @else
                    <span class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} 
                        <i class="fas fa-chevron-down icn"></i>
                        <ul class="dropdown_menu">
                            <li class="list_item">
                                <a href="{{route('admin.accomodations.index')}}">Accomodations Area</a> 
                            </li>
                            <li class="list_item">
                                <a href="{{route('admin.accomodations.adv_index')}}">Advertising Area</a>
                            </li>
                            <li class="list_item">
                                <a href="{{route('admin.accomodations.message_index')}}">Message Area</a>
                             </li>
                        </ul>
                    </span>
                    <a class="link_header" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt icn"></i> {{ ('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
            <i id="hamburger_icn" class="fas fa-bars"></i>
            <div class="hamburger_menu">
                @guest
                <a class="link_header" href="{{ route('login') }}">
                    <i class="fas fa-user icn"></i> {{ ('Login') }}
                </a>
            @if (Route::has('register'))
                <a class="link_header" href="{{ route('register') }}">
                    <i class="fas fa-pen icn"></i> {{ ('Register') }}
                </a>
            @endif
            @else
            <div class="link_header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <div class="list_item">
                   <i class="fas fa-user"></i>{{ Auth::user()->name }}
                </div> 
                <div class="list_item">
                    <a class="link_header" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt icn"></i> {{ ('Logout') }}
                    </a>
                </div>
                    <ul class="dropdown_menu">
                        <li class="list_item">
                            <a href="{{route('admin.accomodations.index')}}">Accomodations Area</a> 
                        </li>
                        <li class="list_item">
                            <a href="{{route('admin.accomodations.message_index')}}">Message Area</a>
                         </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
            </div>
        </div>
    </div>
</header>
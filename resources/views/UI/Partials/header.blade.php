<header>
    <div class="position-flex-header">
        <div class="wrapper">
            <div>
                <img class="header_bnb_logo" src="{{asset('images/air_bnb_logo.png')}}" alt="logo_airbnb">
            </div>
            @if (Route::has('login'))
                <div class="links">
                    <a href="#"><i class="fas fa-bars none"></i></a>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>
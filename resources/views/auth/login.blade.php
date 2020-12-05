@extends('UI.layouts.app')
@section('main_content')
<div class="form_background">
    <div class="form_wrapper">
        <div class="form_text">{{ __('Login') }}</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form_group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="insert your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="insert your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_group">
                <input class="remember_me" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="remember_me" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="form_group">
                <button type="submit" class="form_btn">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="forgot_password" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

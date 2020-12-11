@extends('UI.layouts.app')
@section('main_content')
<div class="form_background">
    <div class="form_wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form_group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" minlength="5" maxlength="50" autofocus placeholder="Insert your name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form_input @error('email') is-invalid @enderror" name="email" required minlength="10" maxlength="100" value="{{ old('email') }}" required autocomplete="email" placeholder="Insert your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_group">
                <label for="password">{{ __('Password') }}</label>
                 <input id="password" type="password" class="form_input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Insert your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
            </div>  
            <div class="form_group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form_input" name="password_confirmation" required autocomplete="new-password" placeholder="Insert your password confirmation">
            </div>
            <div class="form_group">
                <button type="submit" class="form_btn">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
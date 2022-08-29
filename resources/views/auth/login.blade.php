@extends('homepage.master')
@section('title', 'Login')
@section('logo', 'logo-main logo-white')
@section('style')
<style>
    .grecaptcha-badge{display: none !important; }
    #recaptcha_terms{
        display: block !important;
        margin-top: 30px;
        font-family: Roboto-Light;
        font-size: 11px;
        color: #747474;
    }
    #recaptcha_terms a{
        color: #24be56;
        cursor: pointer;
    }
    #recaptcha_terms a:hover{
        color: #36ced1;
        text-decoration: underline;
    }
</style>
@endsection
@section('content')
<div class="wrap-sign-in">
    <div class="main-container">
        <div class="wrap-universal">
            <div class="dim-title">
                <p>{{ __('Enter the protected zone') }}</p>
            </div>
            <div class="wrapper-title">
                <p>
                    {{ __('Sign in') }} {{ __('or') }} <a href="{{ route('register') }}">{{ __('Sign up') }}</a></p>
            </div>
        </div>

        <div class="sign-in">
            <div class="wrap-form">
                <form id="signin-form" method="post" action="{{ route('login') }}" class="form-sign-in">
                    @csrf
                    <div class="input-group">
                        <div class="input-box">
                            <label for="name">{{ __('Username') }}</label>
                            <input type="text" id="name" name="username" value="" class="@error('username') is-invalid @enderror" required autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" name="password" value="" class="@error('password') is-invalid @enderror" required autocomplete="current_password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">{{ __("I don`t remember my password") }}</a>
                    </div>
                    <div class="box-btn">
                        <div class="wrap-btn">
                            <button type="submit" id="signin-form-btn" class="btn-effect btn">{{ __('Sign in to personal account') }} <span></span></button>
                            <br>
                            <a href="{{ route('register') }}" class="btn-effect btn">{{ __('Sign up to join') }} <span></span></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="info-block" style="display: none">
    <div class="main-container">
        <div class="info-block_content">
            <div class="icon-box">
                <img src="{{ asset('splash_assets/images/external/icon/time.png') }}" alt="img">
            </div>
            <div class="box-text">
                <h3>
                    {{ __('While you were viewing this page, :appname found 6 new patterns and made minimum 11 deals.', ['appname' => config('app.name')]) }}                </h3>
                <p>
                    {{ __('Find out how we can help you earn money with our software package! ') }}               </p>
            </div>
            <div class="box-btn">
                <a href="{{route('register')}}" class="btn btn-effect">{{ __('Create an account with :appname', ['appname' => config('app.name')]) }}<span></span></a>
            </div>
        </div>
    </div>
</div>
@endsection

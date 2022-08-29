@extends('homepage.master')
@section('title', 'SignUp')
@section('logo', 'logo-main logo-white')
@section('style')
	
@endsection
@section('content')
<div class="wrap-sign-up">
        <div class="main-container">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>{{ __('Enter the protected zone') }}</p>
                </div>
                <div class="wrapper-title">
                    <p>
                        {{ __('Create a new account or') }} <a href="{{ route('login') }}">{{ __('Sign in') }}</a>                    
                    </p>
                    </div>
                </div>

                <div class="sign-up">
                    <form method="post" action="{{ route('register') }}" class="form-sign-up">
                        @csrf
                        <div class="necessarily">
                            <p>* - {{ __('fields required to be filled') }}.</p>
                        </div>
                        <div class="form-content">
                            <div class="block">
                                <div class="box-title">
                                    <p>1. {{ __('General information') }}</p>
                                </div>
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="email">{{ __('Email') }} *</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-box">
                                        <label for="name">{{ __('Username ') }} *</label>
                                        <input type="text" id="name" name="username" value="{{ old('username') }}" class="" required>
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-box">
                                        <label for="invitation">{{ __('I was invited by') }}</label>
                                        <input type="text" id="invitation" name="referrer" value="{{ old('referrer') }}" class="" >
                                        @if ($errors->has('referrer'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('referrer') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="box-title">
                                    <p>2.{{ __(' Personal information') }}</p>
                                </div>
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="name-1">{{ __('Name') }}</label>
                                        <input type="text" id="name-1" name="fname" value="{{ old('fname') }}" class="" required>
                                        @if ($errors->has('fname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="name-2">{{ __('Surname') }}</label>
                                        <input type="text" id="name-2" name="lname" value="{{ old('lname') }}" class="" required>
                                        @if ($errors->has('lname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="country">{{ __('Country') }}</label>
                                        <select name="country" id="country" class="" required>
                                            <option disabled selected value="">-{{ __(' Choose country ') }}-</option>
                                            @foreach($countries as $c)
                                                <option value="{{$c->id}}" >
                                                    {{$c->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="arrow"></i>
                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="box-title">
                                    <p>3. {{ __('Account security') }}</p>
                                </div>
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="pass-1">{{ __('Create a password') }}*</label>
                                        <input type="password" id="pass-1" name="password" class="" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-box">
                                        <label for="pass-2">{{ __('Confirm password ') }}*</label>
                                        <input type="password" id="pass-2" name="password_confirmation" class="" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="box-pin">
                                        <label for="pin">{{ __('Secret PIN-code') }} *</label>
                                        <div class="input-pin" id="pin">
                                            <input type="password" maxlength="1" name="pin[1]" class="" required>
                                            <input type="password" maxlength="1" name="pin[2]" class="" required>
                                            <input type="password" maxlength="1" name="pin[3]" class="" required>
                                            <input type="password" maxlength="1" name="pin[4]" class="" required>
                                        </div>
                                        @if ($errors->has('pin'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pin') }}</strong>
                                            </span>
                                        @endif
                                        <p>
                                        {{ __('PIN-code is required to confirm financial transactions') }}. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="box-title">
                                    <p>4. {{ __('Terms of use') }}</p>
                                </div>
                                <div class="agreement">
                                    <div class="box-text">
                                        <p>
                                        {{ __('By creating an account in the :appname platform, you automatically accept the following conditions described in the documents below:',['appname' => config('app.name')]) }}                                    </p>
                                        <ul class="list">
                                            
                                            <li class="list_item">
                                                <a target="_blank" href="#">
                                                {{ __('Privacy policy ') }} </a>
                                            </li>
                                            <li class="list_item">
                                                <a target="_blank" href="#">
                                                {{ __('Refund policy & risk disclosure ') }}</a>
                                            </li>
                                        </ul>
                                        <p>
                                       {{ __(' If you have read these documents, please complete the registration by clicking on the “Sign up” button') }}.                                    </p>
                                    </div>
                                    <div class="box-btn">
                                        <button type="submit" class="btn-effect btn">{{ __('Sign up') }} <span></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        {{ __('While you were viewing this page, :appname found 4 new patterns and made minimum 7 deals',['appname' => config('global.title')]) }}.                </h3>
                        <p>
                       {{ __('Find out how we can help you earn money with our software package') }}!                </p>
                    </div>
                    <div class="box-btn">
                        <a href="{{route('register')}}" class="btn btn-effect">{{ __('Create an account with :appname',['appname' => config('app.name')]) }}<span></span></a>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')

@endsection
{{ __('This is just some test mails') }}
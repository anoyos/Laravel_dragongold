@extends('homepage.master')
@section('title', 'Reset Password -- Dragon Gold')
@section('logo', 'logo-main logo-white')
@section('style')

@endsection
@section('content')
<div class="wrap-sign-in">
        <div class="main-container">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>{{ __('Password recovery')}}</p>
                </div>
                <div class="wrapper-title">
                    <p>{{ __('Create a new password')}}</p>
                </div>
            </div>
            <div class="sign-in">
                <div class="wrap-form">
                    <form method="post" action="{{ route('password.update') }}" class="form-sign-in">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group">
                            <div class="input-box">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" class="" name="email" value="" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <label for="pass-1">{{ __('New password') }}</label>
                                <input type="password" id="pass-1" class="" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <label for="pass-2">{{ __('Confirm password') }}</label>
                                <input type="password" id="pass-2" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="box-btn">
                            <div class="wrap-btn">
                                <button type="submit" class="btn-effect btn">{{ __('Reset password') }} <span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection

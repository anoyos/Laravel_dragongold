@extends('homepage.master')
@section('title', 'Reset Password')
@section('logo', 'logo-main logo-white')
@section('styles')
<style>
    .alert {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
        border-radius: .25rem;
    }
    .alert-success {

        color: #1d643b;
        background-color: #d7f3e3;
        border-color: #c7eed8;

    }
</style>
@endsection
@section('content')
<div class="wrap-sign-in">
        <div class="main-container">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>{{ __('Password recovery')}}</p>
                </div>
                <div class="wrapper-title">
                    <p>
                        {{ __('Enter the email address, you provided during registration ') }} </p>
                    </div>
                </div>
                <div class="sign-in">
                    <div class="wrap-form">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert" style="color:">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('password.email') }}" class="form-sign-in">
                            @csrf
                            <div class="input-group">
                                <div class="input-box">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" id="email" name="email" class="" value="" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-btn">
                                <div class="wrap-btn">
                                    <button type="submit" class="btn-effect btn">{{ __('Restore password') }} <span></span></button>
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

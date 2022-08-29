<!-- Description -->
@extends('admin.layouts.fullLayoutMaster')

@section('title', 'Admin Reset Password')

@section('pageStyle')
    <link rel="stylesheet" href="{{ asset('admin_assets/css/pages/authentication.css') }}">
@endsection


@section('content')

<section class="row flexbox-container">
                    <div class="col-xl-7 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0 w-100">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center p-0">
                                    <img src="{{asset('admin_assets/images/logo/logo-pre.png')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{ __('Reset Password') }}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{ __('Please enter your new password.') }}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="post" action="{{ route('password.update') }}">
                                                    @csrf
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                    <fieldset class="form-label-group">
                                                        <input type="text" class="form-control" name="email" id="user-email" placeholder="{{ __('Email') }}" required>
                                                        <label for="user-email">{{ __('Email') }}</label>

                                                        @error('email')
                                                                <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </fieldset>

                                                    <fieldset class="form-label-group">
                                                        <input type="password" class="form-control" name="password" id="user-password" placeholder="{{ __('Password') }}" required autofocus>
                                                        <label for="user-password">{{ __('Password') }}</label>

                                                        @error('password')
                                                                <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </fieldset>

                                                    <fieldset class="form-label-group">
                                                        <input type="password" class="form-control" id="user-confirm-password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                                        <label for="user-confirm-password">{{ __('Confirm Password') }}</label>
                                                    </fieldset>
                                                    <div class="row pt-2">
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block px-0">{{ __('Go Back to Login') }}</a>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <button type="submit" class="btn btn-primary btn-block px-0">{{ __('Reset') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<!--/ HTML Markup -->

@endsection
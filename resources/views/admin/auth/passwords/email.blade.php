<!-- Description -->
@extends('admin.layouts.fullLayoutMaster')

@section('title', 'Admin Reset Password')

@section('pageStyle')
    <link rel="stylesheet" href="{{ asset('admin_assets/css/pages/authentication.css') }}">
@endsection


@section('content')

    <section class="row flexbox-container">
        <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                        <img src="{{asset('admin_assets/images/logo/logo-pre.png')}}" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2 py-1">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">{{ __('Recover your password') }}</h4>
                                </div>
                            </div>
                            <p class="px-2 mb-0">{{ __("Please enter your email address and we'll send you instructions on how to reset your password.") }}</p>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="post" action="{{ route('admin.password.email') }}" id="pass_request">
                                        @csrf
                                        <div class="form-label-group">
                                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="{{ __('Email') }}">
                                            <label for="inputEmail">{{ __('Email') }}</label>

                                            @error('email')
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </form>
                                    <div class="float-md-left d-block mb-1">
                                        <a href="{{ route('adminlogin') }}" class="btn btn-outline-primary btn-block px-75">{{ __('Back to Login') }}</a>
                                    </div>
                                    <div class="float-md-right d-block mb-1">
                                        <a href="#" onclick="document.getElementById('pass_request').submit();" class="btn btn-primary btn-block px-75">{{ __('Recover Password') }}</a>
                                    </div>
                                </div>
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
@extends('homepage.master')
@section('title', 'FAQ')
@section('logo', 'logo-main logo-white')
@section('body-type', 'inner-page')

@section('content')

<div class="wrap-fag">
    <div class="main-container">
        <div class="wrap-universal">
            <div class="dim-title">
                <p>{{ __('Do you have questions? We will answer them!') }}</p>
            </div>
            <div class="wrapper-title">
                <p> {{ __('Frequently Asked Questions') }} </p>
            </div>
        </div>
        <div class="faq-content">
            <div class="faq-nav">
                <ul class="tabs">
                    <li class="tab">
                        <a href="javascript:void(0);">
                            {{ __('Account') }} </a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);">
                            {{ __('Investments') }}</a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);">
                            {{ __('Withdrawal of funds') }}    </a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);">
                            {{ __('Affiliate program') }}    </a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);">
                            {{ __('Profile') }}    </a>
                    </li>
                </ul>
            </div>
            <div class="faq-wrapper">
                <div class="tab-content">
                    @foreach($questions as $qtypes)

                    <div class="tab-item">
                        <div class="accordion">
                            @foreach($qtypes as $qtype)
                            <div class="accordion_block">
                                <a href="javascript:void(0);" class="toggle">
                                    <span class="btn-indy"></span>
                                    {{ $qtype->question }}                </a>
                                <div class="attach">
                                    <div class="attach_box-text">
                                        <p>{{ $qtype->answer }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @endforeach
                </div>
                <div class="wrap-feedback">
                    <div class="wrap-feedback_title">
                        <h2>{{ __('Still have questions') }}</h2>
                        <p>
                            {{ __('Contact us via the feedback form!') }}    </p>
                    </div>
                    <div class="wrap-feedback_content">
                        <img src="{{ asset('splash_assets/images/external/icon/icon-feedback.png') }}" alt="img">
                    </div>
                    <div class="box-btn">
                        <a href="{{ route('feedback') }}" class="btn-effect btn">{{ __('Feedback') }} <span></span></a>
                    </div>
                </div>
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
                <h3> {{__('While you were viewing this page, :appname found :pat new patterns and made minimum :dea deals.', ['appname' => config('global.title'), 'pat' => rand(3,20), 'dea' => rand(3,20)])}} </h3>
                <p> {{ __('Find out how we can help you earn money with our software package!')}} </p>
            </div>
            <div class="box-btn">
                <a href="{{ route('register') }}" class="btn btn-effect">{{__('Create an account with :appname', ['appname' => config('app.name')])}}<span></span></a>
            </div>
        </div>
    </div>
</div>

@endsection
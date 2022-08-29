@extends('homepage.master')
@section('title', 'Webinars')
@section('logo', 'logo-main-blue')
@section('body-type', 'inner-page')

@section('content')

<div class="webinars_top-screen">
    <div class="main-container">
        <div class="webinars_top-screen_box-text">
            <p>{{ $sections['top_screen'] }}</p>
            <h2>{{ $sections['top_want'] }}<br>{{ $sections['top_speaker'] }}</h2>
        </div>
        <div class="webinars_top-screen_box-counter">
            <div class="box-btn">
                <p>{{ $sections['webinar_fill'] }}</p>
                <a href="#" target="_blank" class="btn-effect btn">{{ $sections['become_speaker'] }} <span></span></a>
            </div>
            <div class="box-timer">
                <div class="box-timer_title">
                    <p>{{ $sections['dont_miss'] }}</p>
                </div>
                
                <div class="timer">
                    <p>{{ $sections['next_webinar'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="webinars_section-list">
    <div class="main-container">
        <div class="webinars_section-list_content">
            
            <div class="tab-content">
                <div class="tab-item">
                    <div class="item-row active-item-row">
                        <div class="box-media">
                            <img src="{{ asset('splash_assets/images/external/webinars/web-photo.png') }}" alt="img">
                        </div>
                        <div class="box-text">
                            
                            <div class="box-text_title">
                                <p>{{ $sections['tab_title'] }}</p>
                            </div>
                            <div class="box-text_wrap-text">
                                <p>
                                    {{ $sections['tab_content'] }}<a href="https://docs.google.com/forms/d/e/1FAIpQLSdtiUlIKfsHRc_qDC0QpQrYf7cY4cB0GmFZ6eQd2smLj5y1rg/viewform?usp=sf_link" target="_blank" class="link-effect">{{ $sections['apply'] }} </a>.                                    </p>
                                </div>
                                
                            </div>
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
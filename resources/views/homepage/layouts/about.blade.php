@extends('homepage.master')
@section('title', 'About Us')
@section('logo', 'logo-main logo-white')
@section('body-type', 'inner-page')

@section('content')

<div class="logo-white">
        <div class="work-resource">
            <div class="main-container">
                <div class="work-resource_content">
                    <div class="wrap-universal">
                        <div class="dim-title">
                            <p>{{ $sections['about_work_dim_title'] }}</p>
                        </div>
                        <div class="wrapper-title">
                            <p>
                            {{ $sections['about_work_bold_title'] }}</p>
                        </div>
                        <div class="block-text">
                            <p> {{ $sections['about_work_content'] }} </p>
                        </div>
                    </div>
                    <div class="modules">
                        <ul class="list">
                            <li class="list_item">
                                <div class="icon-box">
                                    <img src="{{ asset('splash_assets/images/external/icon/ic-search.png') }}" alt="img">
                                </div>
                                <div class="box-text">
                                    <h2>{{ $sections['about_analytic_title'] }}</h2>
                                    <p> {{ $sections['about_analytic_content'] }}</p>
                                </div>
                            </li>
                            <li class="list_item">
                                <div class="icon-box">
                                    <img src="{{ asset('splash_assets/images/external/icon/ic-builder.png') }}" alt="img">
                                </div>
                                <div class="box-text">
                                    <h2>{{ $sections['about_partterns_title'] }}</h2>
                                    <p> {{ $sections['about_patterns_content'] }}  </p>
                                </div>
                            </li>
                            <li class="list_item">
                                <div class="icon-box">
                                    <img src="{{ asset('splash_assets/images/external/icon/ic-station.png') }}" alt="img">
                                </div>
                                <div class="box-text">
                                    <h2>{{ $sections['about_trade_title'] }}</h2>
                                    <p>
                                    {{ $sections['about_trade_content'] }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="algorithm">
                    <div class="algorithm_box-text">
                        <div class="wrap-universal">
                            <div class="dim-title">
                                <p>{{ $sections['about_algorithm_dim_title'] }}</p>
                            </div>
                            <div class="wrapper-title">
                                <p> {{ $sections['about_algorithm_bold_title'] }} </p>
                            </div>
                            <div class="block-text">
                                <p>
                                    {{ $sections['about_algorithm_content'] }} </p>
                            </div>
                            <div class="box-btn">
                                <a href="{{ route('register') }}" class="btn btn-effect">{{ __('Get started')}}<span></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="scheme">
                        <div class="scheme-row">
                            <div class="scheme-box scheme-box-one">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-1.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_1'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-2.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_2'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box scheme-box-three">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-3.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_3'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scheme-row scheme-row-center">
                            <div class="scheme-box scheme-box-green">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-4.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_4'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scheme-row">
                            <div class="scheme-box">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-5.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_5'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box scheme-box-green">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-6.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_6'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-7.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_7'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scheme-row">
                            <div class="scheme-box">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-8.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_8'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box scheme-box-green">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-9.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_9'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="scheme-box">
                                <div class="box-content">
                                    <div class="icon">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-10.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_10'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scheme-row scheme-row-center">
                            <div class="scheme-box scheme-box-finish">
                                <div class="box-content">
                                    <div class="media">
                                        <img src="{{ asset('splash_assets/images/external/icon/sc-11.png') }}" alt="img">
                                    </div>
                                    <div class="text">
                                        <p>{{ $sections['about_scheme_11'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blue-logo">

        <div class="section-margin section-main intelligence">
            <div class="main-container w-container">
                <div class="wrap-advantages">
                    <div class="wrap-universal">
                        <div class="dim-title">
                            <p>{{ $sections['about_ai_dim_title'] }}</p>
                        </div>
                        <div class="wrapper-title">
                            <p>
                            {{ $sections['about_ai_bold_title'] }}</p>
                        </div>
                        <div class="block-text">
                            <p>
                            {{ $sections['about_ai_content'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="overview-cards-container">
                    <div class="card overview-card-1 center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/ic-quickly.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['about_oview_title_1'] }}</h6>
                        <p>
                        {{ $sections['about_oview_content_1'] }} </p>
                    </div>
                    <div class="card overview-card-2 center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/ic-profit.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['about_oview_title_2'] }}</h6>
                        <p>
                        {{ $sections['about_oview_content_2'] }} </p>
                    </div>
                    <div class="card center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/ic-brain.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['about_oview_title_3'] }}</h6>
                        <p>
                        {{ $sections['about_oview_content_3'] }} </p>
                    </div>
                </div>
                <div class="wrap-advantages_wrapper-text">
                    <div class="wrap-universal">
                        <div class="block-text">
                            <p> {{ $sections['about_foot_note'] }}</p>
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
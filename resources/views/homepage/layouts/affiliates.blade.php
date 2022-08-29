@extends('homepage.master')
@section('title', 'For Partners')
@section('logo', 'logo-main-blue')
@section('body-type', 'inner-page')

@section('content')

<div class="linear-bonuses">
    <div class="main-container">
        <div class="linear-bonuses_wrap-top">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>{{ $sections['aff_bonus_dim'] }}</p>
                </div>
                <div class="wrapper-title">
                    <p>
                    {{ $sections['aff_bonus_title'] }} </p>
                </div>
                <div class="block-text">
                    <p>
                    {{ $sections['aff_bonus_p1'] }} </p>
                    <p>
                    {{ $sections['aff_bonus_p2'] }} </p>
                    <ul class="list">
                        <li class="list_item">
                            <p>
                                <a href="{{ route('register') }}">{{ $sections['register'] }}</a> on {{ strtoupper(config('app.name'))}} {{ $sections['platform'] }} </p>
                            </li>
                            <li class="list_item">
                                <p>
                                {{ $sections['aff_bonus_list1'] }} </p>
                            </li>
                            <li class="list_item">
                                <p>
                                {{ $sections['aff_bonus_list2'] }} </p>
                            </li>
                        </ul>
                        <p>
                        {{ $sections['aff_bonus_p3'] }} </p>
                    </div>
                </div>
                <div class="wrapper-progress">
                    <div class="wrapper-progress_title">
                        <p>{{ $sections['aff_prog_title'] }}</p>
                    </div>
                    <div class="wrapper-progress_content">
                        <div class="progress-row">
                            <div class="progress-row_title">
                                <span class="level">{{ __('Level 1') }}</span>
                                <span class="percent">{{ config('global.affiliate_l1') }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: {{ config('global.affiliate_l1') * 10 }}%"></div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row_title">
                                <span class="level">{{ __('Level 2') }}</span>
                                <span class="percent">{{ config('global.affiliate_l2') }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: {{ config('global.affiliate_l2') * 10 }}%"></div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row_title">
                                <span class="level">{{ __('Level 3') }}</span>
                                <span class="percent">{{ config('global.affiliate_l3') }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: {{ config('global.affiliate_l3') * 10 }}%"></div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row_title">
                                <span class="level">{{ __('Level 4') }}</span>
                                <span class="percent">{{ config('global.affiliate_l4') }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: {{ config('global.affiliate_l4') * 10 }}%"></div>
                            </div>
                        </div>
                        <div class="progress-row">
                            <div class="progress-row_title">
                                <span class="level">{{ __('Level 5') }}</span>
                                <span class="percent">{{ config('global.affiliate_l5') }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width: {{ config('global.affiliate_l5') * 10 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="representative-bonus">
            <div class="page__scene">
                <ul id="scene" class="page__scene-inner">
                    <li class="layer" data-depth="0.05"></li>
                </ul>
            </div>
            <div class="main-container">
                <div class="linear-bonuses_wrap-top">
                    <div class="wrap-universal">
                        <div class="dim-title">
                            <p>{{ $sections['rep_bonus_dim'] }}</p>
                        </div>
                        <div class="wrapper-title">
                            <p>
                            {{ $sections['rep_bonus_title'] }} </p>
                        </div>
                        <div class="block-text">
                            <p>
                            {{ $sections['rep_bonus_content'] }} </p>
                        </div>
                        <div class="box-btn">
                            <a href="#" target="_blank" class="btn-effect btn-red">{{ $sections['become_a_rep'] }} <span></span></a>
                        </div>
                    </div>
                    <div class="wrapper-progress">
                        <div class="wrapper-progress_title">
                            <p>{{ $sections['rep_bonus_title'] }}</p>
                        </div>
                        <div class="wrapper-progress_content">
                            <div class="progress-row">
                                <div class="progress-row_title">
                                    <span class="level">{{ __('Level 1') }}</span>
                                    <span class="percent">{{ config('global.affiliate_l1') }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ config('global.affiliate_l1') * 10 }}%"></div>
                                </div>
                            </div>
                            <div class="progress-row">
                                <div class="progress-row_title">
                                    <span class="level">{{ __('Level 2') }}</span>
                                    <span class="percent">{{ config('global.affiliate_l2') }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ config('global.affiliate_l2') * 10 }}%"></div>
                                </div>
                            </div>
                            <div class="progress-row">
                                <div class="progress-row_title">
                                    <span class="level">{{ __('Level 3') }}</span>
                                    <span class="percent">{{ config('global.affiliate_l3') }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ config('global.affiliate_l3') * 10 }}%"></div>
                                </div>
                            </div>
                            <div class="progress-row">
                                <div class="progress-row_title">
                                    <span class="level">{{ __('Level 4') }}</span>
                                    <span class="percent">{{ config('global.affiliate_l4') }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ config('global.affiliate_l4') * 10 }}%"></div>
                                </div>
                            </div>
                            <div class="progress-row">
                                <div class="progress-row_title">
                                    <span class="level">{{ __('Level 5') }}</span>
                                    <span class="percent">{{ config('global.affiliate_l5') }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: {{ config('global.affiliate_l5') * 10 }}%"></div>
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
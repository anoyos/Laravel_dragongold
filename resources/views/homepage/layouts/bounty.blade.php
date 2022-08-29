@extends('homepage.master')
@section('title', 'Bounty Program')
@section('logo', 'logo-main-blue')
@section('body-type', 'inner-page bounty-program')

@section('content')
<section class="one-screen-bounty">
    <div class="main-container">
        <div class="one-screen-bounty_content">
            <div class="box-text">
                <div class="box-text_title-small">
                    <p>
                        {{ $sections['scrn_title_small'] }} </p>
                </div>
                <div class="box-text_title-big">
                    <p>
                        {{ $sections['scrn_title_big'] }} </p>
                </div>
                <div class="box-text_title-sub">
                    <p class="text-yellow">
                        {{ $sections['scrn_title_subp'] }} <sup>{{ __('cash giveaway') }}</sup>
                    </p>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['scrn_content'] }} </p>
                </div>
                <div class="box-text_wrap-list">
                    <ul class="list">
                        <li class="list_item">
                            <p>
                                {{ __('You must be registered on our') }} <a href="{{ route('register') }}">{{ __('website') }}</a>. </p>
                        </li>
                        <li class="list_item">
                            <p>
                                {{ __('You must have a deposit for any amount.') }} </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="box-media">
        <img src="{{ asset('splash_assets/images/external/bounty/case.png') }}" alt="img">
    </div>
</section>

<section class="section-bounty">
    <div class="main-container">
        <div class="section-bounty_content">
            <div class="box-media">
                <img src="{{ asset('splash_assets/images/external/bounty/yt.png') }}" alt="img">
            </div>
            <div class="box-text">
                <div class="box-text_title-small">
                    <p>
                        {{ $sections['bounty_title_small'] }} </p>
                </div>
                <div class="box-text_title-big">
                    <p>
                        {{ $sections['bounty_title_big'] }} </p>
                </div>
                <div class="box-text_title-sub">
                    <p class="text-pink">
                        {{ $sections['bounty_title_sub'] }}
                    </p>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['bounty_text'] }} </p>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['min_bonus'] }}<span class="text-pink">{{ $sections['per_video'] }}</span>
                    </p>
                    <p>
                        {{ $sections['max_bonus'] }} <span class="text-pink">{{ $sections['per_video2'] }}</span>
                    </p>
                </div>
                <div class="box-text_wrap-list">
                    <ul class="list">
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['youtube_channel'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['num_of_subc'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['your_channel'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['video_review'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['title_video'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['get_paid'] }} </p>
                        </li>
                        <li class="list_item no-after">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['place_desc_top'] }} <br>
                                {{ $sections['link_example'] }} <a href="{{ config('app.url').'/referrer/user' }}">{{ config('app.url').'/referrer/login' }}</a> </p>
                        </li>
                    </ul>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['more_subscribers'] }} </p>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['youtube_owner'] }} <a href="{{ route('feedback') }}">{{ $sections['contact_form'] }}</a> </p>
                </div>
                <div class="box-btn">
                    <a href="https://docs.google.com/forms/d/16_SzY-knmO1LIKUPBvwGOIstXr55rgRP0b4MmGP4lu4" class="bounty-btn-pink btn-effect">
                        {{ $sections['submit_video'] }} <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-bounty section-bounty-blue">
    <div class="main-container">
        <div class="section-bounty_content">
            <div class="box-text">
                <div class="box-text_title-small">
                    <p>
                        {{ $sections['retweet_news'] }} </p>
                </div>
                <div class="box-text_title-big">
                    <p>
                        {{ $sections['retweet_title_big'] }} </p>
                </div>
                <div class="box-text_title-sub">
                    <p class="text-blue">
                        {{ $sections['retweet_title_sub'] }} </p>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['bonus'] }} <span class="text-blue">{{ $sections['tweet_bonus'] }}</span>
                    </p>
                </div>
                <div class="box-text_wrap-list">
                    <ul class="list">
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['tw_bullet1'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['tw_bullet2'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['tw_bullet3'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['tw__bullet4'] }} </p>
                        </li>
                    </ul>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['twitter_owner'] }} <a href="https://Dragon Gold.systems/feedback">{{ $sections['contact_form'] }}</a> </p>
                </div>
                <div class="box-btn">
                    <a href="https://docs.google.com/forms/d/1yqWRtpNg67Kb-y5NZjhbiF1POmBrJIn765SVEpK1x2I" class="bounty-btn-blue btn-effect">
                        {{ $sections['submit_retweet'] }} <span></span>
                    </a>
                </div>
            </div>
            <div class="box-media">
                <img src="{{ asset('splash_assets/images/external/bounty/tw.png') }}" alt="img">
            </div>
        </div>
    </div>
</section>

<section class="section-bounty section-bounty-orange">
    <div class="main-container">
        <div class="section-bounty_content">
            <div class="box-media">
                <img src="{{ asset('splash_assets/images/external/bounty/btc.png') }}" alt="img">
            </div>
            <div class="box-text">
                <div class="box-text_title-small">
                    <p>
                        {{ $sections['bitcoin_small'] }} <a href="https://bitcointalk.org">https://bitcointalk.org</a>. </p>
                </div>
                <div class="box-text_title-big">
                    <p>
                        {{ $sections['bitcoin_big'] }} </p>
                </div>
                <div class="box-text_title-sub">
                    <p class="text-orange">
                        {{ $sections['bitcoin_sub'] }}
                        <sup>{{ $sections['bitcoin_sup'] }}</sup>
                    </p>
                </div>
                <div class="box-text_wrap-list">
                    <ul class="list">
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['bit_bullet1'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['bit_bullet2'] }} </p>
                        </li>
                        <li class="list_item">
                            <p>
                                <i class="mark-desc"></i>
                                {{ $sections['bit_bullet3'] }} </p>
                        </li>
                    </ul>
                </div>
                <div class="box-text_wrap-text">
                    <p>
                        {{ $sections['bit_rank'] }} </p>
                    <p>
                        <span class="text-orange">{{ __('Member') }}</span>
                        {{ $sections['member_bonus'] }}
                    </p>
                    <p>
                        <span class="text-orange">{{ __('Full') }}</span>
                        {{ $sections['full_bonus'] }}
                    </p>
                    <p>
                        <span class="text-orange">{{ __('Sr. Member') }}</span>
                        {{ $sections['senior_bonus'] }}
                    </p>
                    <p>
                        <span class="text-orange">{{ __('Hero') }}</span>
                        {{ $sections['hero_bonus'] }}
                    </p>
                    <p>
                        <span class="text-orange">{{ __('Legendary Member') }}</span>
                        {{ $sections['legendary_bonus'] }}
                    </p>
                </div>
                <div class="box-btn">
                    <a href="https://docs.google.com/forms/d/1MMSPIa-AreUYGg0v77HWIpqywWzGxwrmmvwcs3TqabI" class="bounty-btn-orange btn-effect">
                        {{ __('Submit your signature') }} <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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
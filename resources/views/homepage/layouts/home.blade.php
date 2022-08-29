@extends('homepage.master')
@section('title', 'Welcome')
@section('logo', 'logo-main logo-white')
@section('body-type', 'home-page')
@section('pageid', '5bca171dff3beddfe77bd71c')
@section('siteid', '5bbe453491c51d7bfef37285')
@section('content')

<div data-w-id="9df6f68a-00f6-08c5-aa6f-969a0db66460" style="opacity:0;display:none"
    class="dot-matrix click-thru"></div>

    <div data-w-id="ac56ecb6-c9a4-6f0a-f673-9e1def27dcc8" class="intro-sections">
        <div data-w-id="39134a93-dc50-c121-6a5f-22b053cacf29" class="blue-logo">
            <div id="dragonback">
                
            </div>
            <div data-w-id="6da9b4f6-74e8-c2b8-989e-658a7f0aaaa9" class="home-bg-section bg-main">
                <div class="main-container">
                    <div class="wrap-home">
                        <div class="wrap-home_wrap-text">
                            <h1>{{ $sections['home_header_title']}}</h1>
                            <p>{{ $sections['home_header_subtitle']}}</p>
                            <div class="box-btn">
                                <a href="#" class="btn btn-pink cmodal-open" data-modal="video-investors-modal">{{ __('Watch the video')}}</a>
                            </div>
                            <div class="box-scroll">
                                <div class="div-block-16 div-block-17 div-block-18 div-block-19 div-block-20 div-block-21 div-block-22 div-block-23 div-block-24 scroll-mouse-outline div-block-29">
                                    <div data-w-id="ff812884-e796-7252-9900-27807ea3a7e6"
                                    class="div-block-25 div-block-26 div-block-27 div-block-28 scroll-dot"
                                    style="opacity: 0.09264; transform: translate3d(0px, 5.45166px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; will-change: opacity, transform;">
                                    </div>
                                </div>
                                <p>{{ __('scroll to learn more')}}</p>
                            </div>
                        </div>
                        <div class="wrap-home_wrap-media">
                            <div class="box-media"><!-- MEDIA --></div>
                        </div>
                    </div>
                </div>
            </div>

        <div data-w-id="5a0cd6c6-bd52-4f2e-c165-57edb5a29f33" class="home-bg-section">
            <div class="wrap-decision">
                <div class="main-container">
                    <div class="decision">
                        <div class="decision_wrap-text">
                            <p class="text-green">
                                {{ $sections['home_header_speed']}} <sub>{{ __('seconds')}}</sub>
                            </p>
                            <h2> {{ __('average decision making speed')}}.</h2>
                            <div class="box-text">
                                <p>{{ $sections['home_header_ahead']}}</p>
                            </div>
                            <div class="box-btn">
                                <a href="{{route('investors')}}" class="btn btn-effect"> {{ __('Find out how it works')}} <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div data-w-id="5a0cd6c6-bd52-4f2e-c165-57edb5a29f38" class="home-bg bg-2">
                <div class="bg2-circles-container">
                    <div data-w-id="85712518-b43d-36c5-fa85-94ab04185c99" class="circle-group rev row-an-top">
                        <img src="{{ asset('splash_assets/images/external/row/r-6.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-8.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-11.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-5.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-4.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-3.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-2.png') }}" width="450" alt="" class="bg2-circle"/>
                    </div>
                    <div data-w-id="85712518-b43d-36c5-fa85-94ab04185ca3" class="circle-group">
                        <img src="{{ asset('splash_assets/images/external/row/r-4.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-3.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-6.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-5.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-1.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-10.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-9.png') }}" width="450" alt="" class="bg2-circle"/>
                    </div>
                    <div data-w-id="85712518-b43d-36c5-fa85-94ab04185caf" class="circle-group rev row-an-bot">
                        <img src="{{ asset('splash_assets/images/external/row/r-4.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-3.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-6.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-10.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-7.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-8.png') }}" width="450" alt="" class="bg2-circle"/>
                        <img src="{{ asset('splash_assets/images/external/row/r-11.png') }}" width="450" alt="" class="bg2-circle"/>
                    </div>
                </div>
            </div>
        </div>

        <div data-w-id="56128be3-9980-1071-8d52-7a1f19a9a937" class="home-bg-section">
            <div class="wrap-any-market">
                <div class="main-container">
                    <div class="any-market">
                        <div class="any-market_wrap-text">
                            <h2> {{ $sections['home_market_title']}}</h2>
                            <div class="box-text">
                                <p> {{ $sections['home_market_text']}} </p>
                            </div>
                            <div class="box-btn">
                                <a href="{{route('investors')}}" class="btn btn-effect">{{ __('For :appname investors', ['appname' => config('app.name')])}} <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-bg bg-3">
                <div class="div-block-2">
                    <div class="bg3-bar-group">
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-1.png') }}" width="255"
                            data-w-id="f4194aa4-8cc6-1809-8a50-16a46f926187"
                            alt="" class="bg-bar bar-marg5"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-2.png') }}" width="255" alt="" class="bg-bar bar-marg4"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-3.png') }}" width="255" alt="" class="bg-bar bar-marg2"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-4.png') }}" width="255"
                            data-w-id="ed174355-1ef8-4cf6-cf95-007a447fd842"
                            alt="" class="bg-bar bar-marg4"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-5.png') }}" width="255" alt="" class="bg-bar bar-marg1"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-6.png') }}" width="255" alt="" class="bg-bar bar-marg3"/>
                        </div>
                        <div class="bg3-bar-group_box-media">
                            <img src="{{ asset('splash_assets/images/external/market/m-7.png') }}" width="255" alt="" class="bg-bar bar-marg2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="blue-logo">
        <div data-w-id="4a8b201c-c496-dc96-b423-63975c6d3b09" class="home-bg-section">

            <div class="main-container">
                <div class="wrap-bonus">
                    <div class="wrap-bonus_wrap-media">
                        <div class="round-circles">
                            <div class="circles-holder">
                                <div class="circle circle1"></div>
                                <div class="circle circle2"></div>
                                <div class="circle circle3"></div>
                                <div class="circle circle4"></div>
                                <img src="{{ asset('splash_assets/images/external/logo-pre.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="wrap-bonus_wrap-text">
                        <h2>{{ $sections['home_partner_title']}}</h2>
                        <p> {!! $sections['home_partner_text'] !!}</p>
                            <div class="box-btn">
                                <a href="{{ route('home.affiliates')}}" class="btn btn-effect">{{ __(':appname affiliate program', [ 'appname' => config('app.name')])}} <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="home-bg bg-4">
                    <div data-w-id="ebc81e14-7643-6cf3-681a-b6fdcc0bc241" class="dotwave-2"></div>
                    <div data-w-id="e2259d9e-f3e8-f73a-f48e-a4a7ebeed482" class="dotwave-1"></div>
                    <div data-w-id="f07c2810-8229-7b47-7dc7-e6510bfd9789" class="dotwave-3"></div>

                </div>
            </div>
        </div>

    </div>

    <div data-w-id="b38362de-269f-d39b-c6ed-e45fdfd2c27a" class="logo-white">

        <div src="{{ asset('splash_assets/images/external/laptop-white.png') }}" class="section-margin section-main">
            <div class="main-container w-container">
                <div class="wrap-advantages">
                    <div class="wrap-universal">
                        <div class="dim-title">
                            <p>{{ $sections['home_advantage_head']}}</p>
                        </div>
                        <div class="wrapper-title">
                            <p>{{ $sections['home_advantage_subhead']}}</p>
                        </div>
                    </div>
                </div>
                <div class="overview-cards-container">
                    <div class="card overview-card-1 center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/icon-mony.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['home_service1_title']}}</h6>
                        <p> {{ $sections['home_service1_text']}}</p>
                    </div>
                    <div class="card overview-card-2 center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/icon-calendar.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['home_service2_title']}}</h6>
                        <p> {{ $sections['home_service2_text']}} </p>
                    </div>
                    <div class="card center-flex">
                        <img src="{{ asset('splash_assets/images/external/icon/icon-affiliate.png') }}" alt="" class="icon-padding"/>
                        <h6 class="text-dark text-center">{{ $sections['home_service3_title']}}</h6>
                        <p> {{ $sections['home_service3_text']}}</p>
                    </div>
                </div>
                <div class="wrap-advantages_wrapper-text">
                    <div class="wrap-universal">
                        <div class="block-text">
                            <p> {{$sections['home_advantage_footer']}}</p>
                        </div>
                        <div class="box-btn">
                            <a href="{{ route('register')}}" class="btn btn-effect"> @lang('Get started') <span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-margin how-it-works-1">
            <div class="container main-container how-it-works hiw-1 w-container">
                <div class="col-1-3 hiw-1 text-wrap">
                    <h4>{{$sections['home_ai_title1']}}</h4>
                    <h3>{{$sections['home_ai_title1']}}</h3>
                    <p>{{$sections['home_ai_text1']}} </p>
                    <p>{{ $sections['home_ai_text2']}}</p>
                </div>
                <div data-w-id="f7ac86df-90b6-8e5b-c605-95200edbd757" class="hiw-1-chart">
                    <div class="hiw-1-chart-labels">
                        <h5 data-w-id="a7cc3a13-8987-aeb6-c4b9-ff51bfcacbb5" class="hiw-chart-h5">@lang('Data collecting')</h5>
                        <h5 data-w-id="73175129-0d2a-a2df-9170-78a5af56ba2c" class="hiw-chart-h5">@lang('Analysis')</h5>
                        <h5 data-w-id="08eec062-a10b-3b79-ed73-98c2e028a9c3" class="hiw-chart-h5">@lang('Plan')</h5>
                        <h5 class="hiw-chart-h5">@lang('Action')</h5>
                    </div>
                    <div class="chart-blocks-container">
                        <div data-w-id="20d6a2e2-9dfa-5af7-8c56-16614eba86bf" class="hiw-1-chartlayer chart-title-block">
                            <div class="chart-text-right">
                                <img src="{{ asset('splash_assets/images/external/icon/brain.png') }}" alt="img" class="image-8"/>
                                <p class="text-ppl-machine text-bright-blue caps">@lang('MACHINE')</p>
                            </div>
                            <div class="chart-text-left">
                                <img src="{{ asset('splash_assets/images/external/icon/user.png') }}" alt="img" class="image-7"/>
                                <p class="text-ppl-machine text-red caps">@lang('HUMAN')</p>
                            </div>
                        </div>
                        <div data-w-id="20d6a2e2-9dfa-5af7-8c56-16614eba86c6" class="hiw-1-chartlayer">
                            <div class="chart-text-right">
                                <p class="text-ppl-machine text-bright-blue">{{$sections['home_ai_pro1']}}</p>
                            </div>
                            <div class="chart-text-left">
                                <p class="text-ppl-machine text-red">{{$sections['home_ai_con1']}}</p>
                            </div>
                        </div>
                        <div data-w-id="20d6a2e2-9dfa-5af7-8c56-16614eba86cd" class="hiw-1-chartlayer">
                            <div class="chart-text-right">
                                <p class="text-ppl-machine text-bright-blue">{{$sections['home_ai_pro2']}}</p>
                            </div>
                            <div class="chart-text-left">
                                <p class="text-ppl-machine text-red">{{$sections['home_ai_con2']}}</p>
                            </div>
                        </div>
                        <div data-w-id="20d6a2e2-9dfa-5af7-8c56-16614eba86d4" class="hiw-1-chartlayer">
                            <div class="chart-text-right">
                                <p class="text-ppl-machine text-bright-blue">{{$sections['home_ai_pro3']}}</p>
                            </div>
                            <div class="chart-text-left">
                                <p class="text-ppl-machine text-red">{{$sections['home_ai_con3']}}</p>
                            </div>
                        </div>
                        <div data-w-id="20d6a2e2-9dfa-5af7-8c56-16614eba86db" class="hiw-1-chartlayer">
                            <div class="chart-text-right">
                                <p class="text-ppl-machine text-bright-blue">{{$sections['home_ai_pro4']}}</p>
                            </div>
                            <div class="chart-text-left">
                                <p class="text-ppl-machine text-red">{{$sections['home_ai_con4']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left-text-bg"></div>
        </div>

        <div data-w-id="ed1272ea-848e-a2fa-d8b2-0cc3d7ed2f02" class="section-margin how-it-works-2 w-clearfix">
            <div data-w-id="6e6baa43-6761-322d-c7db-c2b8dc4918bd" style="display:none;opacity:0" class="phone-container">
                <img src="{{ asset('splash_assets/images/external/icon3.svg') }}" data-w-id="d5333e0b-96cc-25ad-7f02-eef26dd53d01" alt="img" height="300px" 
                class="blue-oval _1"/>
                <img src="{{ asset('splash_assets/images/external/icon3.svg') }}" data-w-id="c55cda87-2fb3-5fd5-221e-9fc0acddf4fe" alt="img" height="300px" 
                class="blue-oval _3"/>
                <div class="home-phone">
                    <img src="{{ asset('splash_assets/images/external/phone-white.png') }}" data-w-id="4d3ee8b8-35ec-56a8-0809-9d1864f7cac4" alt="img"
                    class="phone-chrome"/>
                </div>
            </div>
            <div data-w-id="ed1272ea-848e-a2fa-d8b2-0cc3d7ed2f03" class="container main-container how-it-works w-container">
                <div class="col-1-3 text-wrap">
                    <h4>{{ $sections['home_use_title']}}</h4>
                    <h3>{{ $sections['home_use_subtitle']}}</h3>
                    <p> {{ $sections['home_use_text']}}</p>
                </div>
                <div class="phone-container mobile">
                    <img src="{{ asset('splash_assets/images/external/icon3.svg') }}" data-w-id="d5333e0b-96cc-25ad-7f02-eef26dd53d01" height="250px"  alt="img"
                    class="blue-oval _1"/>
                    <img src="{{ asset('splash_assets/images/external/icon3.svg') }}" data-w-id="c55cda87-2fb3-5fd5-221e-9fc0acddf4fe" height="250px" alt="img"
                    class="blue-oval _3"/>
                    <div class="home-phone">
                        <img src="{{ asset('splash_assets/images/external/phone-white.png') }}" data-w-id="4d3ee8b8-35ec-56a8-0809-9d1864f7cac4"
                        alt="img"
                        class="phone-chrome"/>
                    </div>
                </div>
            </div>
            <div class="left-text-bg"></div>
        </div>

        <div data-w-id="d165b057-ec70-8f6d-f7b7-75954dd681d8" class="section-margin how-it-works-4 w-clearfix">
            <div data-w-id="84813ca4-882d-b9a8-2197-9f3b13480566" style="display:none;opacity:0" class="mac-container">
                <div class="home-mac">
                    <div class="waves-container">
                        <div data-w-id="f8f15a03-3c72-eefd-55b9-a1affcb16f2c" class="waves odd"></div>
                        <div data-w-id="ba3f8455-a828-c42b-adae-3028e5476e4a" class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                    </div>
                    <div data-w-id="fb1e49c7-5926-271d-3e2f-d111e19356f7" style="-webkit-transform:translate3d(0, 30PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 30PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 30PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 30PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                    class="mac-chrome-div">
                    <div class="mac-screen-div">
                        <div class="w-embed">
                            <div id="macscreen" style="max-width:100%;position:relative;"></div>
                        </div>
                    </div>
                    <img src="{{ asset('splash_assets/images/external/mac.png') }}" sizes="100vw" alt="img" class="mac-chrome"/>
                </div>
            </div>
        </div>
        <div class="container main-container how-it-works w-container">
            <div class="col-1-3 text-wrap">
                <h4>{{ $sections['home_use_title2']}}</h4>
                <h3>{{ $sections['home_use_subtitle2']}}</h3>
                <p>{{ $sections['home_use_text2']}} </p>
                <div class="box-btn">
                    <a href="{{route('register')}}" class="btn btn-effect"> @lang('Get started')<span></span></a>
                </div>
            </div>
            <div class="mac-container-mobile">
                <div class="home-mac">
                    <div class="waves-container">
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                        <div class="waves odd"></div>
                        <div class="waves"></div>
                    </div>
                    <div class="mac-chrome-div">
                        <div class="mac-screen-div">
                            <div class="w-embed">
                                <div id="macscreen-mobile" style="max-width:100%;position:relative;"></div>
                            </div>
                        </div>
                        <img src="{{ asset('splash_assets/images/external/mac.png') }}" sizes="100vw" alt="img" class="mac-chrome"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-text-bg"></div>
    </div>

    <div data-w-id="59beafbf-1414-1213-2c4b-1770f08386e5" class="section-margin section-main">
        <div data-w-id="dfc2221a-1395-30b3-b0da-f8d672bd2f5f" style="opacity:0" class="main-container w-container">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>{{ $sections['home_time_title']}}</p>
                </div>
                <div class="wrapper-title">
                    <p>{{ $sections['home_time_subtitle']}}</p>
                </div>
                <div class="block-text">
                    <p>{{ $sections['home_time_text']}}</p>
                </div>
                <div class="box-btn">
                    <a href="{{ route('register')}}" class="btn btn-effect">@lang('Create an account') <span></span></a>
                </div>
            </div>
            <div class="list-pay">
                <div class="list-pay_title">
                    <p>@lang('You can invest using'):</p>
                </div>
                <ul class="list">
                    <li id="w-node-fe122527994d-e77bd71c" class="list_item advisory-logo">
                        <span>
                            <img src="{{ asset('splash_assets/images/external/pay/bitcoin.svg') }}" alt="bitcoin"/>
                        </span>
                    </li>
                    <li id="w-node-0cd05e7cac09-e77bd71c" class="list_item advisory-logo">
                        <span>
                            <img src="{{ asset('splash_assets/images/external/pay/litecoin.svg') }}" alt="litecoin"/>
                        </span>
                    </li>
                    <li id="w-node-4cb4f7964018-e77bd71c" class="list_item advisory-logo">
                        <span>
                            <img src="{{ asset('splash_assets/images/external/pay/ethereum.svg') }}" alt="ethereum"/>
                        </span>
                    </li>
                    <li id="w-node-19c9083825b1-e77bd71c" class="list_item advisory-logo">
                        <span>
                            <img src="{{ asset('splash_assets/images/external/pay/tron.svg') }}" alt="tron"/>
                        </span>
                    </li>
                    <li id="w-node-cb676c281340-e77bd71c" class="list_item advisory-logo">
                        <span>
                            <img src="{{ asset('splash_assets/images/external/pay/ripple.svg') }}" alt="riple"/>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="cmodal cmodal-video modal-main" id="video-investors-modal">
    <div class="modal-content">
        <div class="cmodal-video-content" data-cmodal-youtube-id="{{config('global.video')}}" data-cmodal-autplay></div>
        <div class="box-btn">
            <a href="#" class="btn-effect close-modal">@lang('Close') <span></span></a>
        </div>
    </div>
</div>
@endsection
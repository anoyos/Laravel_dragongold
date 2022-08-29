
<!--Mobile Btn Menu-->
<input type="checkbox" id="menu">
<label href="javascript:void(0);" for="menu" class="menu"><span></span><span></span><span></span></label>
<div class="overlay"></div>
<!--END Mobile Btn Menu-->

<a data-w-id="dc3b9fb5-6d7f-d692-1152-2cfd03dc3897" href="{{ route('index') }}" class="@yield('logo', 'logo-main logo-white') w-inline-block"></a>

{{-- Replace logo-main-with @yield('logo', 'logo-main-blue') --}}

<!--NAV-->
<div data-w-id="de2a1829-80cc-f873-5cab-dd0dfcfc5f5f" class="nav">
    <div class="wrap-nav">
        <div class="language">
            <ul class="language-select">
                @foreach($languages as $lang)
                <li class="@if($lang->code === session('locale', 'en')) active @endif" data-lang="{{$lang->code}}">
                    <span>{{$lang->code}}</span>
                    <img src="{{ asset('images/flags/' . $lang->code  . '.svg') }}" alt="{{$lang->code}}">
                </li>
                @endforeach
            </ul>
        </div>

        <div class="box-btn">
            <a href="#"
               data-w-id="d49a5b77-a48b-bee1-c433-6c9ba5dad4fd"  class="mob-expand w-inline-block stat-btn btn-effect">
                <img src="{{ asset('splash_assets/images/external/icon/ic-stat.png') }}" alt="">
                <b>@lang('Statistics')</b>
            </a>
            <a href="https://t.me/dragongold_hk"
               data-w-id="d49a5b77-a48b-bee1-c433-6c9ba5dad4fd" class="mob-expand w-inline-block telegram-btn btn-effect">
                <img src="{{ asset('splash_assets/images/external/icon/ic-tel.png') }}" alt="">
                <b>Telegram</b> <span></span>
            </a>
            <a href="{{ route('login') }}"
               data-w-id="d49a5b77-a48b-bee1-c433-6c9ba5dad4fd"  class="mob-expand w-inline-block login-btn btn-effect"> @lang('Sign in') / @lang('Sign up') <span></span>
            </a>
        </div>
    </div>
</div>
<div class="nav-mobile">
    <div class="logo-mobile">
        <a href="#">
            <img src="{{ asset('splash_assets/images/external/logo-light.svg') }}" alt="{{ config('app.name')}}">
        </a>
    </div>
    <ul class="list">
        <li class="list_item">
            <a href="{{ route('index') }}" style="{{ (request()->is('/')) ? 'color: #ffea00' : '' }}">{{ __('Home') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('about') }}" style="{{ (request()->is('about')) ? 'color: #ffea00' : '' }}">{{ __('About :appname',['appname' => config('app.name')]) }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('investors') }}" style="{{ (request()->is('investors')) ? 'color: #ffea00' : '' }}">{{ __('For investors') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('home.affiliates') }}" style="{{ (request()->is('affiliates')) ? 'color: #ffea00' : '' }}">{{ __('For partners') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('news') }}" style="{{ (request()->is('news')) ? 'color: #ffea00' : '' }}">{{ __('News') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('faq') }}" style="{{ (request()->is('faq')) ? 'color: #ffea00' : '' }}">{{ __('FAQ') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('feedback') }}" style="{{ (request()->is('feedback')) ? 'color: #ffea00' : '' }}">{{ __('Feedback') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('bounty-program') }}" style="{{ (request()->is('bounty-program')) ? 'color: #ffea00' : '' }}">{{ __('Bounty program') }}</a>
        </li>
        <li class="list_item">
            <a href="{{ route('public_webinars') }}" style="{{ (request()->is('webinars')) ? 'color: #ffea00' : '' }}">{{ __('Webinars') }}</a>
        </li>
    </ul>
</div>
<!--END NAV-->
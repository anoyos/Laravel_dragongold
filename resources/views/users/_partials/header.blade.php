<body>
    <div id="page-body" class="">
          <div class="overlay"></div>
          <div class="overlay-settings"></div>

          <section class="news_player_header office">
            <div class="news_player_header-wrapper">
                <div class="news_player_header-content">
                    <div class="block-news">
                        <div class="block-news_title">
                            <p>{{__('News & updates')}}:</p>
                        </div>
                        <div class="marquee">
                            <div class="scroll-wrap">
                                <ul class="list">
                                    <li class="list_item">
                                        <p class="number">2019-07-12</p>
                                        <a href="#" target="_blank">
                                            <span>{{ __('Maintenance warning') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block-player">
                        <audio-player
                            :autoplay="[ 'system', 'music']"
                            :playlists="{{$music}}">
                        </audio-player>

                    </div>
                </div>
            </div>
            <div class="box-btn-toggle">
                <a href="javascript:void(0);"><i class="icon-down"></i></a>
            </div>
        </section>

        <header class="header">
            <div class="container">
                <div class="header_content">
                    <div class="btn-menu">
                        <input type="checkbox" id="menu">
                        <label href="javascript:void(0);" for="menu" class="menu"><span></span><span></span><span></span></label>
                    </div>
                    <div class="box-logo">
                        <div class="logo">
                            <a href="{{route('dashboard')}}">
                                <img src="{{ asset('user_assets/images/logo-dark.svg') }}" alt="{{config('global.title')}}">
                            </a>
                        </div>
                        <div class="language">
                            <p>{{ __('Language') }}</p>
                            <ul class="language-select">
                                @foreach($languages as $lang)
                                <li class="@if($lang->code === session('locale', 'en')) active @endif" data-lang="{{$lang->code}}">
                                    <span>{{$lang->code}}</span>
                                    <img src="{{ asset('images/flags/' . $lang->code  . '.svg') }}" alt="{{$lang->code}}" width="30">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="box-settings">
                            <div style="width: 125px"></div>

                            <div class="box-btn">
                                <ul>
                                    <li>
                                        <a href="{{route('settings')}}" class="btn-settings">
                                            <i class="icon-cog"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="btn-pink" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="icon-exit"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                       </li>
                                    </ul>
                                </div>
                            </div>

                            <ul class="list">
                                <li class="list_item">
                                    <p>{{ __('Days online') }}</p>
                                    <span>@daysOnline</span>
                                </li>
                                <li class="list_item">
                                    <p>{{ __('Invested') }}</p>
                                    <span class="text-green">@totalInvested</span>
                                </li>
                                <li class="list_item">
                                    <p>{{ __('Paid') }}</p>
                                    <span class="text-green">@totalPaid</span>
                                </li>
                                <li class="list_item" style="border: none">
                                    <p>{{ __('Investors around the world') }}</p>
                                    <span> @totalInvestors</span>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-mobile-nav">
                            <a href="javascript:void(0);">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
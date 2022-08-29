<nav class="nav">
    <div class="language">
        <p>Language</p>
        <ul class="language-select">
            @foreach($languages as $lang)
            <li class="active" data-lang="{{strtolower($lang->code)}}">
                <span>{{strtolower($lang->code)}}</span>
                <img src="{{ asset('images/flags/' . strtolower($lang->code)  . '.svg') }}" alt="{{strtolower($lang->code)}}" width="30">
            </li>
            @endforeach
        </ul>
    </div>
    <div class="profile">
        <div class="profile_main">
            <div class="avatar">
                <img src="{{ asset('user_assets/images/avatar/' . Auth::user()->username .'.png') }}" alt="{{Auth::user()->username}}">
            </div>
            <div class="box-text">
                <div class="box-text_box-name">
                    <p>Welcome,</p>
                    <p class="name">{{ Auth::user()->username }}</p>
                </div>
                <div class="box-text_box-ranks">
                    <p>
                        <span>Rank:</span>
                        <span class="ranks">N/A</span>
                    </p>
                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('Your rank in the affiliate program system') }}"></i>
                </div>
            </div>
        </div>
        <div class="profile_info">
            <ul class="list">
                <li class="list_item">
                    <span>Server time</span>
                    <strong>{{date('H:i')}} UTC</strong>
                </li>
                <li class="list_item">
                    <span>Last login:</span>
                    <strong>{{$lastLog->created_at->format('Y-m-d / H:i')}}</strong>
                </li>
                <li class="list_item">
                    <span>IP:</span>
                    <strong>{{$lastLog->address}}</strong>
                </li>
            </ul>
        </div>
    </div>

    <div class="referrer-link">
        <div class="referrer-link_title">
            <p>Affiliate link</p>
        </div>
        <div class="box-link">
            <div class="link">
                <span>{{route('referrer', ['username' => Auth::user()->username])}}</span>
            </div>
            <button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="{{route('referrer', ['username' => Auth::user()->username])}}">
                Copy<span></span>
            </button>
        </div>
    </div>
    <div class="navigation">
        <ul class="list">
            <li class="list_item">
                <a href="{{route('dashboard')}}" class="@if(request()->url() == route('dashboard')) active @endif">
                    <i class="icon-home"></i>
                    <span>Control panel</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('deposit.create')}}" class="@if(request()->url() == route('deposit.create')) active @endif">
                    <i class="icon-plus"></i>
                    <span>Make a deposit</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('deposit.index')}}" class="@if(request()->url() == route('deposit.index')) active @endif">
                    <i class="icon-bank"></i>
                    <span>My deposits</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('withdraw.create')}}" class="@if(request()->url() == route('withdraw.create')) active @endif">
                    <i class="icon-withdraw"></i>
                    <span>Withdraw funds</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('transactions')}}" class="@if(request()->url() == route('transactions')) active @endif">
                    <i class="icon-list"></i>
                    <span>Transactions</span>
                </a>
            </li>

            <li class="list_item">
                <a href="{{route('statistics')}}" class="@if(r{{ __('Language') }}dif">
                    <i class="icon-growth"></i>
                    <span>Statistics center</span>Language
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('affiliates')}}" class="@if(r{{ __('Language') }}dif">
                    <i class="icon-user"></i>
                    <span>Affiliate program</span>Language
                </a>
            </li>

            <li class="list_item">
                <a href="{{route('support')}}" class="@if(request()->url() == route('support')) active @endif">
                    <i class="icon-support"></i>
                    <span>Support</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('news.index')}}" class="@if(request()->url() == route('news.index')) active @endif">
                    <i class="icon-news"></i>
                    <span>Platform news</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('webinars')}}" class="@if(request()->url() == route('webinars')) active @endif">
                    <i class="icon-webinar"></i>
                    <span>Webinars</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{ route('settings') }}" class="@if(request()->url() == route('settings')) active @endif">
                    <i class="icon-cog"></i>
                    <span>Account settings</span>
                </a>
            </li>
            <li class="list_item">
                <a href="#">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" width="25px" viewBox="0 0 196.265 196.264"
                         fill="#d204b5">
                    <g>
                    <g>
                    <path d="M82.183,182.165h-27.23C31.296,69.921,76.226,38.985,76.783,38.595c1.97-1.25,2.553-3.887,1.294-5.857
                          c-1.252-2.001-3.883-2.615-5.887-1.304c-2.128,1.327-51.567,34.346-24.854,155.92c0.433,1.924,2.156,3.335,4.169,3.335h30.677
                          c2.358,0,4.262-1.896,4.262-4.256C86.445,184.081,84.541,182.165,82.183,182.165z"/>
                    <path d="M116.637,182.165H97.335C61.326,100.77,87.522,60.026,87.791,59.616c1.311-1.928,0.79-4.584-1.146-5.911
                          c-1.956-1.31-4.584-0.807-5.915,1.146c-1.23,1.797-29.867,45.482,9.962,133.353c0.693,1.512,2.216,2.485,3.888,2.485h22.072
                          c2.369,0,4.26-1.896,4.26-4.256C120.896,184.081,118.997,182.165,116.637,182.165z"/>
                    <path d="M152.72,182.165h-21.993c-32.41-47.656-31.107-96.721-31.1-97.238c0.088-2.346-1.759-4.324-4.105-4.412
                          c-2.867-0.283-4.334,1.759-4.412,4.097c-0.08,2.158-1.513,53.592,33.891,104.254c0.798,1.142,2.1,1.791,3.503,1.791h24.225
                          c2.356,0,4.264-1.892,4.264-4.256C156.983,184.081,155.068,182.165,152.72,182.165z"/>
                    <path d="M192.021,182.165h-23.845c-5.241-6.38-25.435-31.266-34.367-46.858c-2.966-5.182-8.151-16.928-12.219-26.425
                          l18.927,13.713c1.042,0.722,2.353,0.974,3.555,0.67c1.234-0.309,2.265-1.167,2.802-2.309L160.55,92.19
                          c0.674-1.422,0.229-3.062-0.697-4.334c-0.905-1.246-2.737-1.914-4.296-1.673c-8.211,1.162-15.821-5.975-15.821-14.443
                        {{ __('Language') }}4
                        {{ __('Language') }}08-2.096-3.435-2.158
                        {{ __('Language') }}
                        {{ __('Language') }}4.224,3.675h36.075
                        {{ __('Language') }}-81.507
                        {{ __('Language') }}507,0.218,2.244,0.054
                        {{ __('Language') }}.445-5.654-15.08-5.654
                        {{ __('Language') }}
                        {{ __('Language') }},41.421
                        {{ __('Language') }}4.261-4.256
                        {{ __('Language') }}73,3.28
                        {{ __('Language') }}
                    <pat{{ __('Language') }}
                        {{ __('Language') }}0.148,1.034,0.148
                        {{ __('Language') }}5.979-0.793
                        {{ __('Language') }}
                    </g>{{ __('Language') }}
                    </g>
                    </svg>

                    <span style="color: #d204b5"> #BlockchainSummit2019</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="nav">
    <div class="language">
        <p>Language</p>
        <ul class="language-select">
            @foreach($languages as $lang)
            <li class="@if($lang->code === session('locale', 'en')) active @endif" data-lang="{{$lang->code}}">
                <span>{{$lang->code}}</span>
                <img src="{{ asset('images/flags/' . $lang->code  . '.svg') }}" alt="{{$lang->code}}" width="30">
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
                    <p>{{ __('Welcome') }},</p>
                    <p class="name">{{ Auth::user()->username }}</p>
                </div>
                <div class="box-text_box-ranks">
                    <p>
                        <span>{{ __('Rank') }}:</span>
                        <span class="ranks">N/A</span>
                    </p>
                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('Your rank in the affiliate program system') }}"></i>
                </div>
            </div>
        </div>
        <div class="profile_info">
            <ul class="list">
                <li class="list_item">
                    <span>{{ __('Server time') }}</span>
                    <strong>{{date('H:i')}} UTC</strong>
                </li>
                <li class="list_item">
                    <span>{{ __('Last login') }}:</span>
                    <strong>{{$lastLog->created_at->format('Y-m-d / H:i')}}</strong>
                </li>
                <li class="list_item">
                    <span>{{ __('IP') }}:</span>
                    <strong>{{$lastLog->address}}</strong>
                </li>
            </ul>
        </div>
    </div>

    <div class="referrer-link">
        <div class="referrer-link_title">
            <p>{{ __('Affiliate link') }}</p>
        </div>
        <div class="box-link">
            <div class="link">
                <span>{{route('referrer', ['username' => Auth::user()->username])}}</span>
            </div>
            <button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="{{route('referrer', ['username' => Auth::user()->username])}}">
                {{ __('Copy') }} <span></span>
            </button>
        </div>
    </div>
    <div class="navigation">
        <ul class="list">
            <li class="list_item">
                <a href="{{route('dashboard')}}" class="@if(request()->url() == route('dashboard')) active @endif">
                    <i class="icon-home"></i>
                    <span>{{ __('Control panel') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('deposit.create')}}" class="@if(request()->url() == route('deposit.create')) active @endif">
                    <i class="icon-plus"></i>
                    <span>{{ __('Make a deposit') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('deposit.index')}}" class="@if(request()->url() == route('deposit.index')) active @endif">
                    <i class="icon-bank"></i>
                    <span>{{ __('My deposits') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('withdraw.create')}}" class="@if(request()->url() == route('withdraw.create')) active @endif">
                    <i class="icon-withdraw"></i>
                    <span>{{ __('Withdraw funds') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('transactions')}}" class="@if(request()->url() == route('transactions')) active @endif">
                    <i class="icon-list"></i>
                    <span>{{ __('Transactions') }}</span>
                </a>
            </li>

            <li class="list_item">
                <a href="{{route('statistics')}}" class="@if(request()->url() == route('statistics')) active @endif">
                    <i class="icon-growth"></i>
                    <span>{{ __('Statistics center') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('affiliates')}}" class="@if(request()->url() == route('affiliates')) active @endif">
                    <i class="icon-user"></i>
                    <span>{{ __('Affiliate program') }}</span>
                </a>
            </li>

            <li class="list_item">
                <a href="https://t.me/dragongold_hk" class="@if(request()->url() == route('support')) active @endif" target="_blank">
                    <i class="icon-support"></i>
                    <span>{{ __('Support') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('news.index')}}" class="@if(request()->url() == route('news.index')) active @endif">
                    <i class="icon-news"></i>
                    <span>{{ __('Platform news') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{route('webinars')}}" class="@if(request()->url() == route('webinars')) active @endif">
                    <i class="icon-webinar"></i>
                    <span>{{ __('Webinars') }}</span>
                </a>
            </li>
            <li class="list_item">
                <a href="{{ route('settings') }}" class="@if(request()->url() == route('settings')) active @endif">
                    <i class="icon-cog"></i>
                    <span>{{ __('Account settings') }}</span>
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
                          c0-8.015,6.544-14.569,14.579-14.569c5.021,0,9.622,2.579,12.323,6.891c0.817,1.305,2.252,1.994,3.771,1.994
                          c1.511-0.054,2.905-0.912,3.611-2.276l18.826-35.648c0.689-1.282,0.661-2.795-0.044-4.092c-0.705-1.256-2.008-2.096-3.435-2.158
                          c-57.547-3.683-78.181-4.749-86.027-4.476L99.581,8.22c-0.693-1.671-2.3-2.557-4.186-2.645
                          c-0.713,0.03-71.829,4.975-91.149,92.733c-5.056,22.967-5.34,66.275-2.208,88.184c0.299,2.124,2.098,3.675,4.224,3.675h36.075
                          c2.354,0,4.262-1.915,4.262-4.288c0-2.36-1.907-4.239-4.262-4.239H10.015c-2.725-23.716-1.579-62.664,2.569-81.507
                          c15.896-72.16,67.214-83.898,80.317-85.726l3.626,8.885c0.487,1.196,1.475,2.09,2.693,2.477c0.745,0.218,1.507,0.218,2.244,0.054
                          c4.199-0.419,37.325,1.475,66.398,3.274c0.834,5.198,4.008,9.552,8.648,11.686l-7.117,13.505c-4.132-3.61-9.445-5.654-15.08-5.654
                          c-12.748,0-23.106,10.365-23.106,23.107c0,11.289,8.11,20.678,18.807,22.69l-8.656,18.246L114.28,93.064
                          c-1.53-1.143-3.623-1.059-5.134,0.1c-1.482,1.175-2.031,3.214-1.311,4.97c0.529,1.303,12.925,31.562,18.559,41.421
                          c10.64,18.55,35.45,48.345,36.492,49.584c0.813,0.974,2.008,1.534,3.273,1.534h25.844c2.353,0,4.261-1.892,4.261-4.256
                          C196.28,184.081,194.373,182.165,192.021,182.165z M176.607,29.622c1.904,0.118,3.795,0.245,5.65,0.353l-1.73,3.28
                          C178.78,32.596,177.385,31.319,176.607,29.622z"/>
                    <path d="M154.278,34.072c0-2.362-1.896-4.248-4.264-4.248h-37.137c-1.471,0-2.813,0.725-3.595,1.939
                          c-0.789,1.25-0.89,2.779-0.276,4.098l6.456,13.998c0.528,1.162,1.603,2.025,2.837,2.332c0.337,0.096,0.682,0.148,1.034,0.148
                          c0.913,0,1.831-0.307,2.593-0.878l7.005-5.4c1.871-1.445,2.216-4.109,0.773-5.969c-1.431-1.889-4.092-2.22-5.979-0.793
                          l-2.757,2.128l-1.435-3.094h30.48C152.383,38.35,154.278,36.437,154.278,34.072z"/>
                    </g>
                    </g>
                    </svg>

                    <span style="color: #d204b5">#BlockchainSummit2019</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
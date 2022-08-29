@include('homepage._partials.nav')
<!-- Telegram Modal and Trigger -->

<div class="modal-main modal-telegram">
    <div class="modal-content">
        <ul class="list">
            <li class="list_item">
                <a href="https://t.me/dragongold_hk" target="_blank">
                    <span>
                        @Dragon_Gold_Chat
                    </span>
                </a>
            </li>
            <li class="list_item">
                <a href="https://t.me/dragongold_hk" target="_blank">
                    <img src="{{ asset('splash_assets/images/vendor/flag-icon-css/flags/4x3/us.svg') }}" alt="@dragongold_support_ENG">
                    <span>
                        @dragongold_support_ENG
                    </span>
                </a>
            </li>
            <li class="list_item">
                <a href="https://t.me/dragongold_hk" target="_blank">
                    <img src="{{ asset('splash_assets/images/vendor/flag-icon-css/flags/4x3/es.svg') }}" alt="@dragongold_support_ES">
                    <span>
                        @dragongold_support_ES
                    </span>
                </a>
            </li>
            <li class="list_item">
                <a href="https://t.me/dragongold_hk" target="_blank">
                    <img src="{{ asset('splash_assets/images/vendor/flag-icon-css/flags/4x3/cn.svg') }}" alt="@dragongold_support_ZH">
                    <span>
                        @dragongold_support_ZH
                    </span>
                </a>
            </li>
            <li class="list_item">
                <a href="https://t.me/dragongold_hk" target="_blank">
                    <img src="{{ asset('splash_assets/images/vendor/flag-icon-css/flags/4x3/ru.svg') }}" alt="@dragongold_support_RU">
                    <span>
                        @dragongold_support_RU
                    </span>
                </a>
            </li>
        </ul>
        <div class="box-btn">
            <a href="#" class="btn-effect close-modal">{{ __('Close') }} <span></span> </a>
        </div>
    </div>
</div>

<div class="modal-main modal-statistics">
    <div class="modal-content">
        <ul class="list">
            <li class="list_item">
                <img src="{{ asset('splash_assets/images/external/icon/ic-day.png') }}">
                <p class="item-title">{{ __('Days online') }}</p>
                <p class="item-number">@daysOnline</p>
            </li>
            <li class="list_item">
                <img src="{{ asset('splash_assets/images/external/icon/ic-paid.png') }}" alt="img">
                <p class="item-title">{{ __('Total invested') }}</p>
                <p class="item-number text-green">@totalInvested</p>
            </li>
            <li class="list_item">
                <img src="{{ asset('splash_assets/images/external/icon/ic-invested.png') }}" alt="img">
                <p class="item-title">{{ __('Total paid') }}</p>
                <p class="item-number text-green">@totalPaid</p>
            </li>
            <li class="list_item">
                <img src="{{ asset('splash_assets/images/external/icon/ic-investors.png') }}" alt="img">
                <p class="item-title">{{ __('Total investors around the world') }}</p>
                <p class="item-number">@totalInvestors</p>
            </li>
        </ul>
        <div class="box-btn">
            <a href="#" class="btn-effect close-modal">{{ __('Close') }}<span></span></a>
        </div>
    </div>
</div>

<!-- End Telegram Modal and Trigger -->


<footer class="footer">
    <div class="main-container">
        <div class="footer_content">
            <div class="footer-info-box">
                <div class="footer-logo">
                    <a href="{{route('index')}}">
                        <img src="{{ asset('splash_assets/images/external/logo-light.svg') }}" alt="{{ config('app.name')}}">
                    </a>
                </div>
                <div class="footer-text">
                    <p>
                       {{ __('Please') }}, <a href="{{ route('feedback') }}" class="link-effect">{{ __('contact us') }}</a>, {{ __('if you have any questions about the :appname platform',['appname' => config('app.name')]) }}. </p>
                    </div>
                </div>
                <div class="footer-nav">
                    <ul class="list">
                        <li class="list_item">
                            <a href="{{ route('index') }}" class="link-effect">{{ __('Home') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('about') }}" class="link-effect">{{ __('About :appname',['appname' => config('app.name')]) }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('investors') }}" class="link-effect">{{ __('For investors') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('home.affiliates') }}" class="link-effect">{{ __('For partners') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('news') }}" class="link-effect">{{ __('News') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('faq') }}" class="link-effect">{{ __('FAQ') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('feedback') }}" class="link-effect">{{ __('Feedback') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('bounty-program') }}" class="link-effect">{{ __('Bounty program') }}</a>
                        </li>
                        <li class="list_item">
                            <a href="{{ route('public_webinars') }}" class="link-effect">{{ __('Webinars') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-list">
                    <ul class="list">
                        <li class="list_item">
                            <p>{{config('global.company_name')}}</p>
                        </li>
                        <li class="list_item">
                            <p>Company No. {{config('global.company_number')}}</p>
                        </li>
                        <li class="list_item">
                            <p>{{config('global.company_address')}}</p>
                        </li>
                        <li class="list_item">
                            <p>{{config('global.company_country')}}</p>
                        </li>
                        <li class="list_item"></li>
                        <li class="list_item">
                            <a target="_blank" href="{{asset('docs/articles_of_association.pdf')}}" class="link-effect">{{ __('Articles of association') }}</a>
                        </li>
                        <li class="list_item">
                            <a target="_blank" href="{{ asset('docs/certificate_of_incorporation.pdf')}}" class="link-effect">{{ __('Certificate of incorporation') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>© {{ date('Y')}} {{ config('app.name') }}, @lang('Inc. All rights reserved').</p>
            </div>
        </div>
    </footer>    </div>

    @include('homepage._partials.scripts')
</body>
</html>
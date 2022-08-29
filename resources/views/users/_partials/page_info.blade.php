<section class="page">
                <div class="container">
                    <div class="wrapper-page">
                        <div class="page-content">
                            <div class="page-content_page-header">
                                <div class="title-page">
                                    <h2>@yield('title')</h2>
                                    <div class="bread-crumbs">
                                        <ul class="list">
                                            <li class="list_item">
                                                <a href="{{route('dashboard')}}">{{ __('Personal account') }}</a>
                                            </li>

                                            <li class="list_item">
                                                <span class="bread-crumbs-active">@yield('title')</span>
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
                                            {{ __('Copy') }}<span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
<footer class="footer">
                <div class="container">
                    <div class="footer_content">
                        <div class="footer-info-box">
                            <div class="footer-logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('splash_assets/images/external/logo-light.svg') }}" alt="{{ config('global.title') }}">
                                </a>
                            </div>
                            <div class="footer-text">
                                <p>
                                    {{ __('Please')}}, <a href="{{route('support')}}" class="link-effect">{{ __('contact us')}}</a>, {{ __('if you have any questions about the :appname platform', ['appname' => config('app.name')])}}.</p>
                                </div>
                            </div>
                            <div class="footer-nav">
                                <ul class="list">
                                    <li class="list_item">
                                        <a href="{{ route('index') }}" class="link-effect">{{ __('Home')}}</a>
                                    </li>
                                    <li class="list_item">
                                        <a href="{{ route('about') }}" class="link-effect">{{ __('About :appname', ['appname' => config('app.name')]) }}</a>
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
                                    <li class="list_item">
                                        <a href="#" style="color: #d204b5">#BlockchainSummit2019</a>
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
                            <p> &copy; {{ date('Y')}} {{ config('app.name') }},{{ __('Inc. All rights reserved')}}.</p>
                        </div>
                    </div>
                </footer></div>
                <!--SCRIPT-->
@include('users._partials.scripts')
            </body>
            </html>
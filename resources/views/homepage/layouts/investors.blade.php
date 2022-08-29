@extends('homepage.master')
@section('title', 'For Investors')
@section('logo', 'logo-main-blue')
@section('body-type', 'inner-page')

@section('content')

<div class="section-investor-intellect">
    <div class="main-container">
        <div class="wrap-universal">
            <div class="dim-title">
                <p>{{ __('Invest with intelligence.') }}</p>
            </div>
            <div class="wrapper-title">
                <p>
                    {{ $sections['investors_bold_title'] }} </p>
            </div>
            <div class="block-text">
                <p>
                    {{ $sections['investors_content'] }}<br>
                </p>
            </div>
        </div>
        <div class="section-investor-intellect_schedule">
            <div class="left-box">
                <img src="{{ asset('splash_assets/images/external/3percent.png') }}" alt="img">
                <p>{{ __('per day') }}</p>
                <p class="text-green">{{ __('on business days')  }}</p>
            </div>
            <img src="{{ asset('splash_assets/images/external/graph.png') }}" alt="img">
            <div class="right-box">
                <img src="{{ asset('splash_assets/images/external/1-5percent.png') }}" alt="img">
                <p>{{ __('per day') }}</p>
                <p class="text-blue">{{ __('on weekends') }}</p>
            </div>
        </div>
        <div class="calculator">
            <div class="form-calculator">
                <div class="block-title">
                    <div class="icon">
                        <img src="{{ asset('splash_assets/images/external/icon/calculator.png') }}" alt="img">
                    </div>
                    <div class="box-text">
                        <p>{{ __('Calculate your income') }} </p>
                        <div class="radio-group">
                            <div class="box-radio">
                                <input type="radio" name="calc_type" id="calc-1" class="radio" value="invest" required checked>
                                <label for="calc-1">
                                    {{ __('investing') }}</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="block-sum">
                    <label for="sum">{{ __('Desired investment amount') }} </label>
                    <input id="sum" type="text" value="1000" required name="calc_amount">
                    <span class="currency">USD</span>
                </div>
                <div class="block-result">
                    <div class="block-result_title">
                        <p>{{ __('Your income will be') }}</p>
                    </div>
                    <div class="block-result_content">
                        <div class="box">
                            <p class="text-white result-weekly">N/A</p>
                            <p class="text-green">{{ __('per week') }}</p>
                        </div>
                        <div class="box">
                            <p class="text-white result-monthly">N/A</p>
                            <p class="text-green">{{ __('per month') }}</p>
                        </div>
                        <div class="box">
                            <p class="text-white result-yearly">N/A</p>
                            <p class="text-green">{{ __('per year') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="stable-income">
    <div class="main-container">
        <div class="stable-income_content">
            <div class="wrap-universal" style="max-width: 100%">
                <div class="dim-title">
                    <p>{{ $sections['inv_income_dim'] }}</p>
                </div>
                <div class="wrapper-title">
                    <p>
                        {{ $sections['inv_income_bold'] }}</p>
                </div>
                <div class="block-text">
                    <p style="max-width: 100%">
                        {{ $sections['inv_income_p1'] }} </p>
                    <p style="max-width: 100%">
                        {{ $sections['inv_income_p2'] }} </p>
                </div>
                <div class="box-btn">
                    <a href="{{ route('register') }}" class="btn btn-effect">{{ $sections['create_btn_txt'] }} <span></span></a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section-statistics">
    <div class="main-container">
        <div class="wrap-universal">
            <div class="dim-title">
                <p>{{ $sections['inv_stat_dim'] }}</p>
            </div>
            <div class="wrapper-title">
                <p>
                    {{ __('Platform statistics') }} </p>
            </div>
        </div>

        <div class="section-statistics_content">
            <div class="globe-box">
                <img src="{{ asset('splash_assets/images/external/globe.png') }}" alt="img">
                <ul class="list">
                    <li class="list_item">
                        <p>@daysOnline</p>
                        <span>{{ __('Days online') }}</span>
                    </li>
                    <li class="list_item">
                        <p>@totalInvested</p>
                        <span>{{ __('Total Invested') }}</span>
                    </li>
                    <li class="list_item">
                        <p>@totalPaid</p>
                        <span>{{ __('Total Paid') }}</span>
                    </li>
                    <li class="list_item">
                        <p>@totalInvestors</p>
                        <span>{{ __('Total investors around the world') }}</span>
                    </li>
                    <li class="list_item">
                        <p>@deals</p>
                        <span>{{ __('Deals Made') }}</span>
                    </li>
                </ul>
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

@section('javascript')
<script>
    $(document).ready(function() {
        function calculatorDemo() {
            var amountEl = $('.form-calculator [name="calc_amount"]');
            var amount = parseFloat(amountEl.val());
            var type = $('.form-calculator [name="calc_type"]').val();

            var result = {
                weekly: null,
                monthly: null,
                yearly: null
            };

            var percents = {
                workdays: {{ config('global.profit_main') / 100}},
                weekend: {{ config('global.profit_weekend') / 100}},
            };

            amountEl.removeClass('invalid');
            if (!isNaN(amount) && amount > 0 && amount < 90000) {
                if (type === 'invest') {
                    result.weekly   = amount * (percents.workdays*5 + percents.weekend*2);
                    result.monthly  = result.weekly * 4;
                    result.yearly   = result.monthly * 12;
                }
            } else {
                amountEl.addClass('invalid');
            }

            $('.result-weekly').text(result.weekly === null ? 'N/A' : '$ '+result.weekly.toFixed(2));
            $('.result-monthly').text(result.monthly === null ? 'N/A' : '$ '+result.monthly.toFixed(2));
            $('.result-yearly').text(result.yearly === null ? 'N/A' : '$ '+result.yearly.toFixed(2));
        }

        calculatorDemo();
        $('.form-calculator [name="calc_amount"]').keyup(function() {
            calculatorDemo();
        });
        $('.form-calculator [name="calc_type"]').change(function() {
            calculatorDemo();
        });
    });
</script>
@endsection
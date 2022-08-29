@extends('users.layouts.master')

@section('title', __('Control panel'))
@section('content')

<div class="finance">
    <div class="income">
        <div class="animation-box">
            <img src="{{ asset('user_assets/images/animation-media.svg') }}" alt="img" >
        </div>
        <div class="income_wrap-content">
            <p>{{ __("Today's income") }}</p>
            <p class="the-sum"> @usd($today) *</p>
            <div class="box-btn">
                <a href="{{route('deposit.create')}}" class="btn-effect btn-green">
                    {{ __('Make a deposit') }} <span></span>
                </a>
            </div>
        </div>
        <div class="footnote">
            <p>
                * {{ __('Income is calculated in US dollars at the exchange rate Bitmex (in case you have deposits in cryptocurrency).') }}
            </p>
        </div>
    </div>
    <div class="finance-bar">
        <div class="finance-bar_box">
            <div class="finance-bar_box_wrap-text">
                <div class="icon">
                    <img src="{{ asset('user_assets/images/ic-balance.png') }}" alt="img">
                </div>
                <div class="text">
                    <p>{{ __('Available balance') }}</p>
                    <p class="the-sum"> @usd($balance) *</p>
                </div>
            </div>
            <div class="box-btn">
                <a href="{{route('withdraw.create')}}" class="btn-effect">{{ __('Withdraw funds') }} <span></span></a>
            </div>
        </div>
        <div class="finance-bar_box">
            <div class="finance-bar_box_wrap-text">
                <div class="icon">
                    <img src="{{ asset('user_assets/images/ic-income.png') }}" alt="img">
                </div>
                <div class="text">
                    <p>{{ __('Income from deposits') }}</p>
                    <p class="the-sum">@usd($totalCredits) *</p>
                </div>
            </div>
            <div class="box-btn">
                <a href="{{route('transactions')}}" class="btn-effect">{{ __('Statistics') }} <span></span></a>
            </div>
        </div>
        <div class="finance-bar_box">
            <div class="finance-bar_box_wrap-text">
                <div class="icon">
                    <img src="{{ asset('user_assets/images/ic-mony.png') }}" alt="img">
                </div>
                <div class="text">
                    <p>{{ __('Total invested') }}</p>
                    <p class="the-sum"> @usd($totalDeposits) *</p>
                </div>
            </div>
            <div class="box-btn">
                <a href="{{route('deposit.index')}}" class="btn-effect">{{ __('My deposits') }} <span></span></a>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">
        <p>{{ __('Active deposits') }}</p>
    </div>
    <div class="active-deposit  page-deposit ">
        <div class="active-deposit_box">
            <ul class="list">
                <li class="list_item">
                    <p>{{ __('No data') }}</p>
                </li>
            </ul>
            {{--
            @foreach($transactions as $trans)
                <ul class="list">
                    <li class="list_item">
                        <p> - {{$trans->amount }} {{$trans->currency->symbol }}</p>
                    </li>
                    <li class="list_item">
                        {{$trans->currency->name}}<span>{{$trans->created_at }}</span>
                    </li>
                    <li class="list_item">
                        <p>
                            {{ __('Invested')}}
                        </p>
                        
                    </li>
                    <li class="list_item">
                        <p>
                            {{ __('Income Received')}}
                        </p>
                    </li>
                    <li class="list_item">
                        
                    </li>
                    <li class="list_item">
                        
                    </li>
                </ul>
            @endforeach
            --}}
        </div>

        <div class="section-footer">
            <div class="wrap-text">
                <p class="bold-text">
                    {{ __('Create a deposit with') }} {{ config('global.app')}} </p>
                <p> {{ __('Get your stable everyday profit today!') }} </p>
            </div>
            <div class="box-btn">
                <a href="{{route('deposit.create')}}" class="btn-effect btn-green">
                    {{ __('Make a deposit') }} <span></span>
                </a>
                <a href="{{route('deposit.index')}}" class="btn-effect btn">
                    {{ __('My deposits') }} <span></span>
                </a>
            </div>
        </div>    
    </div>
</div>
<div class="section">
    <affiliates-team-summary-tabs inline-template>
        <div class="info-referral">
            <div class="referral-nav">
                <div class="title-referral">
                    <p>{{ __('Referrals Summary') }}</p>
                </div>
                <ul class="tabs nojquery">
                    <li class="tab" :class="{active: 'all'===active_tab}">
                        <a href="" @click.prevent.stop="showTab('all')">
                            {{ __('For all time') }}                        </a>
                    </li>
                    <li class="tab" :class="{active: 'today'===active_tab}">
                        <a href="" @click.prevent.stop="showTab('today')">
                            {{ __('Today') }}                        </a>
                    </li>
                    <li class="tab" :class="{active: 'week'===active_tab}">
                        <a href="" @click.prevent.stop="showTab('week')">
                            {{ __('For a week') }}                        </a>
                    </li>
                    <li class="tab" :class="{active: 'month'===active_tab}">
                        <a href="" @click.prevent.stop="showTab('month')"> {{ __('For a month') }} </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content nojquery">
                <div class="tab-item"
                     v-for="(tab, key) in tabs"
                     :class="{active: key===active_tab}" :key="'tabcontent'+key">

                    <simple-spinner v-if="tab.isLoading" class="simple-spinner" :size="60" :line-size="4"></simple-spinner>

                    <template v-if="!tab.isLoading">
                        <ul class="list">
                            <li class="list_item">
                                <span class="icon">
                                    <img src="{{ asset('user_assets/images/ic--use.png') }}" alt="icon">
                                </span>
                                <p>{{ __('Total partners') }}</p>
                                <p class="number">
                                    {{-- {{ tab.data.referrals_count | formatFiat('', {minFraction:0}) }} --}}74848
                                </p>
                            </li>
                            <li class="list_item">
                                <span class="icon">
                                    <img src="{{ asset('user_assets/images/ic-graph.png') }}" alt="icon">
                                </span>
                                <p>{{ __('Your affiliate income') }}</p>
                                <p class="number text-green">
                                    {{-- {{ tab.data.user_referrals_earnings | formatFiat }} --}}09393
                                </p>
                            </li>
                            <li class="list_item">
                                <span class="icon">
                                    <img src="{{ asset('user_assets/images/ic-rank.png') }}" alt="icon">
                                </span>
                                <p>
                                    {{ __('Your leader rank') }} <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('Your rank in the affiliate program system') }}"></i>
                                </p>
                                <p class="number text-green">
                                    N/A
                                </p>
                            </li>
                        </ul>
                    </template>
                </div>
            </div>
            <div class="section-footer">
                <div class="wrap-text">
                    <p class="bold-text">
                        {{ __('Partnership with') }} {{config('global.app')}}  </p>
                    <p>
                        {{ __('Get additional revenue using the :appname Leadership Program', ['appname' => config('global.app')]) }}                    </p>
                </div>
                <div class="box-btn">
                    <a href="{{route('affiliates')}}" class="btn-effect btn-green">
                        {{ __('Affiliate program') }} <span></span>
                    </a>
                </div>
            </div>
        </div>
    </affiliates-team-summary-tabs>
</div>
<div class="section">
    <div class="section-title">
        <p>{{ __('Last transactions') }}</p>
    </div>
    <div class="last-transactions">
        <ul class="list list-title">
            <li class="list_item">
                <p>{{ __('Date') }}</p>
            </li>
            <li class="list_item">
                <p>{{ __('Type') }}</p>
            </li>
            <li class="list_item">
                <p>{{ __('Amount') }}</p>
            </li>
        </ul>

        @forelse ($transactions as $trans)
        @php $class = $trans->type == 'withdraw'?'text-red':'text-green' @endphp
        <ul class="list">
            <li class="list_item">
                <p class="{{$class}}">{{$trans->created_at}}</p>
            </li>
            <li class="list_item">
                <p class="{{$class}}">{{$trans->type}}</p>
            </li>
            <li class="list_item" >
                <p class="{{$class}}">@usd($trans->amount * $trans->currency->usdrate)</p>
            </li>
        </ul>
        @empty
        <ul class="list">
            <li class="list_item"></li>
            <li class="list_item">
                <p>{{ __('No data') }}</p>
            </li>
            <li class="list_item"></li>
        </ul>
        @endforelse

        <div class="box-btn">
            <a href="{{route('transactions')}}" class="btn-effect">{{ __('Transaction details') }} <span></span></a>
        </div>
    </div>
</div>

@endsection
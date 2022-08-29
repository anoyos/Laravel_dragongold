@extends('users.layouts.master')

@section('title', __('My deposits'))

@section('content')
<div class="available-balances">
    <div class="section-title">
        <p>{{ __('Available balances') }}</p>
    </div>
    <div class="available-balances_content">

        @foreach($balances as $balance)
        <div class="balances-box">
            <span class="icon icon-{{ $balance->currency->color }}"><img src="{{ asset('user_assets/images') }}/{{ Str::snake($balance->currency->name) }}.png" alt="{{ $balance->currency->symbol }}"></span>
            <div class="text">
                <p class="title-pay">{{ $balance->currency->name }}</p>
                <p class="number">
                    {{ $balance->amount }} {{ $balance->currency->symbol }}
                </p>
                <a href="{{route('withdraw.create')}}" class="btn-effect">{{ __('Withdraw') }} <span></span></a>
            </div>
        </div>
        @endforeach

    </div>
</div>
<div class="section">
    <div class="create-deposit">
        <div class="section-footer">
            <div class="wrap-text">
                <p class="bold-text">
                    {{ __('Create a deposit with :appname',['appname' => config('app,name')]) }} 
                </p>
                <p>{{ __('Get your stable everyday profit today!') }}</p>
            </div>
            <div class="box-btn">
                <a href="{{route('deposit.create')}}" class="btn-effect btn-green">
                    {{ __(' Make a deposit') }} <span></span>
                </a>
                <a href="{{route('deposit.index')}}" class="btn-effect btn">
                    {{ __('My deposits') }} <span></span>
                </a>
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
        </div>

    </div>
</div>
<div class="section">
    <div class="section-title">
        <p>{{ __('Last transactions for all deposits') }}</p>
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
        <ul class="list">
            <li class="list_item">
                <p class="text-green">{{$trans->created_at}}</p>
            </li>
            <li class="list_item">
                <p class="text-green">{{$trans->deposit->type}}</p>
            </li>
            <li class="list_item" >
                <p class="text-green">@usd($trans->amount * $trans->currency->usdrate)</p>
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
            <a href="{{ route('transactions')}}" class="btn-effect">{{ __('Transactions details') }} <span></span></a>
        </div>
    </div>
</div>

@endsection
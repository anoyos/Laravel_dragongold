@extends('users.layouts.master')

@section('title', __('Account settings'))

@section('content')

<div class="section-settings">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
    @endif
    <div class="wrap-form">
        <div class="box-title">
            <p>{{ __('Deposits options') }}</p>
        </div>
        <form action="{{ route('settings.update.deposit_options') }}" class="form-info" method="post">
            @csrf
            <div class="form-content" style="margin-bottom: 40px">
                <div class="input-block">
                    <div class="box">
                        <div class="title-box">
                            <p style="font-family: 'Roboto-Light';margin-bottom: 5px;">
                                {{ __('Compounding') }}                                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="Compounding is the process in which an asset's earnings, from either capital dragon gold or interest, are reinvested to generate additional earnings over time."></i>
                            </p>
                        </div>
                        <div class="radio-group deposit_options_gr1">
                            <div class="switch-field">
                                <input type="radio" id="compounding-off" name="compounding" value="0" checked/>
                                <label for="compounding-off">{{ __('OFF') }}</label>
                                <input type="radio" id="compounding-on" name="compounding" value="1" />
                                <label for="compounding-on">{{ __('ON') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-block">
                    <div class="box">
                        <div class="title-box">
                            <p style="font-family: 'Roboto-Light';margin-bottom: 5px;">
                                {{ __('Reinvest') }}                                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="You can reinvest funds from your current balance to your increase profit growth."></i>
                            </p>
                        </div>
                        <div class="radio-group deposit_options_gr1">
                            <div class="switch-field">
                                <input type="radio" id="auto_reinvest-off" name="auto_reinvest" value="0" checked/>
                                <label for="auto_reinvest-off">{{ __('OFF') }}</label>
                                <input type="radio" id="auto_reinvest-on" name="auto_reinvest" value="1" />
                                <label for="auto_reinvest-on">{{ __('ON') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-btn">
                <button type="submit" class="btn-effect btn-green">{{ __('Save settings') }} <span></span></button>
            </div>
        </form>
    </div>
    <div class="wrap-form">
        <div class="box-title">
            <p>{{ __('Common information') }}</p>
        </div>

        <form action="{{ route('settings.update.profile') }}" class="form-info" method="post">
            @csrf
            <div class="form-content">
                <div class="input-block">
                    <div class="input-box">
                        <label for="firstname">{{ __('First name') }}</label>
                        <input type="text" id="firstname" name="fname" value="{{ $user->fname }}">
                    </div>
                    <div class="input-box">
                        <label for="name">{{ __('Username') }}</label>
                        <input type="text" class="input-passive" name="username" id="name" value="{{ $user->username }}" readonly>
                    </div>
                </div>
                <div class="input-block">
                    <div class="input-box">
                        <label for="lastname">{{ __('Last name') }}</label>
                        <input type="text" id="lastname" name="lname" value="{{ $user->lname }}">
                    </div>
                    <div class="input-box">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}">
                    </div>

                </div>
            </div>
            <div class="box-btn">
                <button type="submit" class="btn-effect btn-green">{{ __('Save settings') }} <span></span></button>
            </div>
        </form>
    </div>
    <div class="wrap-form">
        <div class="box-title">
            <p>{{ __('Contact information') }}</p>
        </div>
        <form action="{{ route('settings.update.social') }}" class="form-info" method="post">
            @csrf
            <div class="form-content">
                <div class="input-block">
                    <div class="input-box">
                        <label for="telegram">Telegram</label>
                        <input type="text" id="telegram" name="telegram" value="{{ $user->socials[0]->link }}">
                    </div>
                    <div class="input-box">
                        <label for="viber">Viber</label>
                        <input type="text" id="viber" name="viber" value="{{ $user->socials[2]->link }}">
                    </div>
                </div>
                <div class="input-block">
                    <div class="input-box">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ $user->socials[1]->link }}">
                    </div>
                </div>
            </div>
            <div class="box-btn">
                <button type="submit" class="btn-effect btn-green">{{ __('Save settings') }} <span></span></button>
            </div>
        </form>
    </div>
    <div class="wrap-form">
        <div class="box-title">
            <p>{{ __('Finance settings') }}</p>
        </div>
        
        <p class="wallets_set_hint">
            {{ __('Details of payment systems are set only once. If you have any problems with changing the payment systems details, contact') }} <a href="{{route('support')}}">{{ __('technical support') }}</a>.            </p>
            <form action="{{ route('settings.update.wallet') }}" method="post" class="form-finance">
                @csrf

                <div class="input-group">
                @foreach($user->balances as $balance)

                    <div class="input-box">
                        <label for="bitcoin">{{ __('Wallet address') }} {{ $balance->currency->name }}</label>
                        <input type="text" class="wallets" id="{{ $balance->currency->name }}"
                        value="{{ $balance->wallet }}"
                        name="wallets[{{ $balance->currency_id }}]"
                        >
                        <span class="icon icon-orange"><img src="{{ asset('user_assets/images/') }}/{{ Str::snake($balance->currency->name) }}.png" alt="{{ $balance->currency->symbol }}"></span>
                    </div>

                @endforeach

                </div>

                <div class="box-btn">
                    <button type="submit" class="btn-effect btn-green">{{ __('Save settings') }} <span></span></button>
                </div>
            </form>
        </div>
        <div class="wrap-form">
            <div class="box-title">
                <p>{{ __('Security settings') }}</p>
            </div>
            <form action="{{ route('settings.update.password') }}" method="post" class="form-security">
                @csrf
                <div class="input-block">
                    <div class="input-box">
                        <label for="pass-1">{{ __('Enter old password') }}</label>
                        <input type="password" id="pass-1" name="old_password">
                    </div>
                    <div class="input-box">
                        <label for="pass-2">{{ __('Create a new password') }}</label>
                        <input type="password" id="pass-2" name="password">
                    </div>
                    <div class="input-box">
                        <label for="pass-3">{{ __('Repeat new password') }}</label>
                        <input type="password" id="pass-3" name="conf_password">
                    </div>
                </div>
                <div class="box-btn">
                    <button type="submit" class="btn-effect btn-green">{{ __('Save settings') }} <span></span></button>
                </div>
            </form>
        </div>
    </div>

    @endsection

@section('scripts')

<script type="text/javascript">

    function disableWallet(){

        var collection = document.getElementsByClassName('wallets');

        collection.forEach(function(index, value){
            alert("I want to disable the non-empty fields");
        });
    }

    if (
        document.readyState === "complete" ||
        (document.readyState !== "loading" && !document.documentElement.doScroll)
    ) {
      disableWallet();
    } else {
      document.addEventListener("DOMContentLoaded", start);
    }
</script>

@endsection
@extends('homepage.master')
@section('title', 'Feedback')
@section('logo', 'logo-main logo-white')
@section('body-type', 'inner-page')

@section('content')

<div class="wrap-communicate">
        <div class="main-container">
            <div class="wrap-universal">
                <div class="dim-title">
                    <p>Contact us for any question you have!</p>
                </div>
                <div class="wrapper-title">
                    <p>
                    Leave a message in the form below!                    </p>
                </div>
            </div>
            <div class="communicate">
                <div class="wrap-form">
                    <form action="#" method="post" class="form-communicate">
                        @csrf                        <div class="input-group">
                            <div class="input-box">
                                <label for="email">Email address</label>
                                <input type="email" id="email" name="email" value="" class="" required autofocus>
                            </div>
                            <div class="input-box">
                                <label for="name">How can we call you by name?</label>
                                <input type="text" id="name" name="name" value="" class="" required>
                            </div>
                            <div class="input-box">
                                <label for="title">Select the subject of the request</label>
                                <select name="subject" id="title" class="" required>
                                    <option value="" disabled selected>- Select value-</option>
                                    <option value="1">Reset PIN code</option>
                                    <option value="2">Advertising offer</option>
                                    <option value="3">Technical issue</option>
                                    <option value="4">Profile change</option>
                                    <option value="5">Investment</option>
                                    <option value="6">Withdrawal</option>
                                    <option value="7">Question</option>
                                    <option value="8">Translation services</option>
                                    <option value="9">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-massage">
                            <label for="massage">Letter text</label>
                            <textarea id="massage" name="message" class="" required></textarea>
                        </div>
                        <div class="box-btn">
                            <div class="captcha">
                                <div class="captcha-container">
                                    <img src="captchae274.png?r=0.2875106722524" alt="captcha">
                                    <input type="text" class="captcha-input" name="captcha">>
                                </div>
                            </div>
                            <div class="wrap-btn">
                                <button type="submit" class="btn-effect btn">Send a letter <span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="wrap-social">
                    <div class="wrap-social_title">
                        <p>
                        We will also be glad to see you in our social network accounts                        </p>
                    </div>
                    <ul class="list">
                        <li class="list_item">
                            <a href="#" target="_blank" class="icon ic-tel telegram-btn">
                                <img src="{{ asset('splash_assets/images/external/icon/ic-telegram.png') }}" alt="icon">
                            </a>
                        </li>
                        
                        
                        <li class="list_item">
                            <a href="https://www.youtube.com/channel/UCfOXU9nJXuX99kgH2W7ywLg" target="_blank" class="icon ic-yt">
                                <img src="{{ asset('splash_assets/images/external/icon/ic-yt.png') }}" alt="icon">
                            </a>
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
    </div>

@endsection
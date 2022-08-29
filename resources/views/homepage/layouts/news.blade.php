@extends('homepage.master')
@section('title', 'News')
@section('logo', 'logo-main logo-white')
@section('body-type', 'inner-page')

@section('content')

<div class="wrap-news">
    <div class="main-container">
        <div class="wrap-universal">
            <div class="dim-title">
                <p>{{ $sections['whats_new'] }}</p>
            </div>
            <div class="wrapper-title">
                <p>
                {{ $sections['platform_news'] }}                    </p>
            </div>
        </div>
        <div class="wrap-news_content">
                    @if(isset($new))
                       <div class="news">
                        <div class="news_title">
                            <p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
                            <h2>{{ $new->title }}</h2>
                        </div>
                        <div class="news_content">
                            <img src="{{ asset('storage/uploads').'/'.$new->image }}" alt="" width="100%"><br><br><p>{{ $new->body }}</p>
                            </div>
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    @else

                        @foreach($all as $new)
                            <div class="news">
                                <div class="news_title">
                                    <p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
                                    <h2>{{ $new->title }}</h2>
                                </div>
                                <div class="news_content">
                                    <img src="{{ asset('storage/uploads').'/'.$new->image }}" alt="" width="100%"><br><br><p>{{ $new->body }}</p>
                                    </div>
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            @break
                        @endforeach

                    @endif
            <div class="news-sidebar">
                <ul class="list">
                    @foreach($all as $new)
                    <li class="list_item">
                        <p>{{ $new->created_at->format('M j, Y H:ia') }}</p>
                        <a href="{{ route('index.news.show', $new->slug) }}"
                            class="active">
                            {{ $new->title }}
                        </a>
                    </li>
                    @endforeach
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
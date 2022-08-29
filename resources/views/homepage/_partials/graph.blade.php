<meta name="description" content="{{ config('global.description')}}">
<meta name="keywords" content="{{ config('global.tags')}}">

<!-- for Facebook -->          
<meta property="fb:app_id" content="{{config('facebook.app_id')}}">
<meta property="og:title" content="@yield('title') - {{config('global.title', 'Dragon Gold System')}}">
<meta property="og:site_name" content="{{config('app.name')}}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('logo.png')}}">
<meta property="og:image:width" content="300px">
<meta property="og:image:height" content="293px">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:description" content="{{ config('global.description') }}">

<!-- for Twitter -->          
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="@yield('title') - {{config('global.title', 'Dragon Gold System')}}">
<meta name="twitter:description" content="{{ config('global.description') }}">
<meta name="twitter:image" content="{{ asset('logo.png') }}">
<link rel="canonical" href="{{url()->current()}}">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="@yield('title') - {{config('global.title', 'Dragon Gold System')}}">
<meta itemprop="description" content="{{ config('global.description') }}">
<meta itemprop="image" content="{{ asset('logo.png') }}">



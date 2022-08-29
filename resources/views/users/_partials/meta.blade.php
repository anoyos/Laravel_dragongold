<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>@yield('title', __('Control panel')) - {{ __('Office') }} {{config('global.app')}}</title>
<link rel="icon" type="image/png" href="{{asset('favicon.png')}}">

@include('users._partials.styles')
</head>
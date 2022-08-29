<!DOCTYPE html>
<html data-wf-page="@yield('pageid')" data-wf-site="@yield('siteid')" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head prefix="og: http://ogp.me/ns#">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{config('global.title', 'Dragon Gold System')}}</title>
    <!-- START GRAPHCARD -->
    @include('homepage._partials.graph')
    <!-- END GRAPHCARD -->

    @include('homepage._partials.styles')

</head>
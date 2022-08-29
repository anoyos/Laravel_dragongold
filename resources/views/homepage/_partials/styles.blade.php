<link rel="icon" type="image/png" href="favicon.png">
<!--[if IE]><link rel="shortcut icon" href="/favicon.ico"/><![endif]-->

<link href="{{ asset('splash_assets/css/external/style.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('splash_assets/css/external/reset.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('splash_assets/css/external/app.css') }}" rel="stylesheet" type="text/css"/>

<style>
    html {
        font-size: 100%;
        -webkit-text-size-adjust: 100%;
        font-variant-ligatures: none;
        -webkit-font-variant-ligatures: none;
        text-rendering: optimizeLegibility;
        -moz-osx-font-smoothing: grayscale;
        font-smoothing: antialiased;
        -webkit-font-smoothing: antialiased;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
    }

    html, body {
        overflow-x: hidden;
    }

    .click-thru {
        pointer-events: none;
        display: block;
    }
    .section-margin {
        position: static;
    }

    .dot-matrix {
        display: flex !important;
    }
</style>

<!-- HelloPreload -->
<style type="text/css">
    #hellopreloader_preload {
        display: block;
        position: fixed;
        z-index: 99999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #01020f;
    }

    .icon-prel {
        position: absolute;
        display: inline-block;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    
    #dragonvid{
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
    }
    .bg-main {
        background-color: rgba(1,2,15,.5);
    }
</style>

@yield('styles')
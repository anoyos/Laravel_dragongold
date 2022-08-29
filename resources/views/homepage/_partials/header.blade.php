@include('homepage._partials.meta')

<body data-w-id="5bbe453491c51da995f37287" class="body @yield('body-type', 'inner-page') ">

<div id="hellopreloader" >
    <div id="hellopreloader_preload">
        <div class="icon-prel">
            <div class="round-circles">
                <div class="circles-holder">
                    <div class="circle circle1"></div>
                    <div class="circle circle2"></div>
                    <div class="circle circle3"></div>
                    <div class="circle circle4"></div>
                </div>
            </div>
            <img src="{{ asset('splash_assets/images/external/logo-pre.png') }}" alt="{{config('app.name')}}">
        </div>
    </div>
</div>
<script type="text/javascript">
    var hellopreloader = document.getElementById("hellopreloader_preload");

    function fadeOutnojquery(el) {
        el.style.opacity = 1;
        var interhellopreloader = setInterval(function () {
            el.style.opacity = el.style.opacity - 0.05;
            if (el.style.opacity <= 0.05) {
                clearInterval(interhellopreloader);
                hellopreloader.style.display = "none";
            }
        }, 0);
    }

    window.onload = function () {
        setTimeout(function () {
            fadeOutnojquery(hellopreloader);
        }, 1500);
    };
</script>
<!-- HelloPreload -->

<div id="main">
    <section class="news_player_header dark">
        <div class="news_player_header-wrapper">
            <div class="news_player_header-content">
                <div class="block-news">
                    <div class="block-news_title">
                        <p>{{ __('News & updates:') }}</p>
                    </div>
                    <div class="marquee">
                        <div class="scroll-wrap">
                            <ul class="list">
                                <li class="list_item">
                                    <p class="number">2019-06-29</p>
                                    <a href="#" target="_blank">
                                        <span>{{ __('Altcoins transfers maintenance') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="block-player">
                    
                <audio-player
                    :autoplay="['music']"
                    :playlists='{{$music}}'>
                </audio-player>
                    
                </div>
            </div>
        </div>
        <div class="box-btn-toggle">
            <a href="javascript:void(0);"><i class="icon-down"></i></a>
        </div>
    </section>
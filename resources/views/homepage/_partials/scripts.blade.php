<script type="text/javascript">
    !function (o, c) {
        var n = c.documentElement
                , t = " w-mod-";
        n.className += t + "js",
                ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
    }(window, document);
</script>
<script type="text/javascript" src="{{ asset('splash_assets/js/external/lottie.min.js') }}"></script>

{{-- PRELOADER SCRIPT --}}
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


<script src="{{ asset('splash_assets/js/external/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('splash_assets/js/external/app.js') }}" type="text/javascript"></script>

<script>
    (function () {
        var hellopreloader = document.getElementById("hellopreloader_preload");

        let video_default = `<video autoplay muted loop id="dragonvid">` +
                `<source src="{{ asset('splash_assets/videos/external/bg-main.mp4') }}" type="video/mp4">` +
                `</video>`;
        let video_mobile = `<img src="{{ asset('splash_assets/images/external/dragonback.png') }}" alt="img">`;

        function boxVideoCheck() {
            if (window.innerWidth <= 960) {
                if (!document.querySelector('#dragonback img')) {
                    document.querySelector('.wrap-home_wrap-media .box-media').innerHTML = video_mobile;
                }
            } else {
                if (!document.querySelector('#dragonback video')) {
                    document.querySelector('#dragonback').innerHTML = video_default;

                    hellopreloader.style.opacity = 1;
                    hellopreloader.style.display = 'block';

                    document.querySelector('#dragonback video')
                            .addEventListener('canplaythrough', function () {
                                fadeOutnojquery(hellopreloader);
                            })
                }
            }
        }

        boxVideoCheck();
        window.addEventListener('resize', function () {
            boxVideoCheck();
        });
    })();
    
    $(window).bind('scroll', function () {
        console.log('scroll' + $(window).scrollTop());
        if ($(window).scrollTop() <= 200) {
            $('#dragonback').show();
        }else{
            $('#dragonback').hide();
        }
    });
</script>
@yield('javascript')
<script src="{{ asset('splash_assets/js/external/staging-patch.min.js') }}" type="text/javascript"></script>
<script id="godaddy-security-s" src="https://cdn.sucuri.net/badge/badge.js" data-s="2047" data-i="930a284dfc3341852827844cb10cc53cc6a422f629" data-p="r" data-c="l" data-t="g"></script>
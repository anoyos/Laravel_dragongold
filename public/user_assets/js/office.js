$('document').ready(() => {
    // Language bar on dashboard
    $(".language-select").click(function () {
        $(this).toggleClass("open")
    });
    $(".language-select li").click(function () {
        console.log('clicked');
        var e = $(this).data("lang");
        window.location.href = "/lang/" + e, $(".language-select li").removeClass("active"), $(this).toggleClass("active")
    });
    
});
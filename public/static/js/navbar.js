$(document).ready(function () {
    $(".hamburger-btn").click(function () {
        $(".hamburger-btn").toggleClass("activated");
        $(".navbar-mobile").toggleClass("clicked");
        setTimeout(function () {
            $("header, main, footer").toggleClass("blurred");
        }, 500);
    });
    $(".navbar-item-mobile").click(function () {
        $(".hamburger-btn").removeClass("activated");
        $(".navbar-mobile").removeClass("clicked");
        setTimeout(function () {
            $("header, main, footer").removeClass("blurred");
        }, 500);
    });
    $(window).scroll(function () {
        var navbar = $("#navbar .navbar");
        var hamburger = $("#navbar .hamburger-btn");
        var navbarMobile = $("#navbar .navbar-mobile");

        if ($(window).scrollTop() > 100) {
            navbar.fadeOut(300);
            hamburger.fadeIn(300);
        } else {
            navbar.fadeIn(300);
            hamburger.fadeOut(300);
        }
    });
});

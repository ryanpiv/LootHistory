$(document).ready(function() {
    $(document).on('click', '#btn-learn', function() {
        scrollTo($('.js-scroll-trigger')[0]);
    });
    $(document).on('click', '#btn-demo', function() {
        window.open('http://disappointedloa.gear.host', '_blank');
    });
    $(document).on('click', '#btn-start', function() {
        scrollTo($('#section-start'));
    });

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 54)
                }, 1200, "easeInOutExpo");
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#nav-main',
        offset: 54
    });

    $(".dropdown-item").click(function() {
        $(this).parents('.dropdown').find('button').text($(this).text());
        $(this).parents('.dropdown').find('button').val($(this).text());
    });
});

function scrollTo(target) {
    target = $(target.hash);
    $('html, body').animate({
        scrollTop: (target.offset().top - 54)
    }, 1200, "easeInOutExpo");
    return false;
}

function dropDownSelect(item){
    $(item).parents('.dropdown').find('button').text($(item).text());
    $(item).parents('.dropdown').find('button').val($(item).text());
}

function setBnetAuth(ele){
    var url = $('#getting-started-bnet-login-button').data('auth');
    url += $(ele).text();
    $('#getting-started-bnet-login-button').attr('href', url);
}

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 50
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

var sections = ["#page-top", "#about", "#board", "#contact"];
var currentSection = 0;

// jQuery for page scrolling on button click
$(function() {
    $('#fixedButtonDown').bind('click', function(event) {
        if (currentSection != 3) {
            $('html, body').stop().animate({
                scrollTop: $(sections[++currentSection]).offset().top - 50
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        }
    });
});

$(function() {
    $('#fixedButtonUp').bind('click', function(event) {
        if (currentSection != 0) {
            $('html, body').stop().animate({
                scrollTop: $(sections[--currentSection]).offset().top - 50
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        }
    });
});

/*$(".board .imgLink").on({
    mouseenter: function () {
        $(this.getElementsByClassName("imgName")).show();
    },
    mouseleave: function () {
        $(this.getElementsByClassName("imgName")).hide();
    }
});*/

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});
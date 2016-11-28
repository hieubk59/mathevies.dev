(function(){

    "use strict";

    var $menuIcon = $('.menu_icon'),
        $body = $('body'),
        $burger = $('.c-hamburger--htx');

        $menuIcon.click(function(e) {
            $body.toggleClass('open');
            $burger.toggleClass('is-active');
            $('html, body').animate({ scrollTop: 0 }, 700);
        });

// Scroll to anchor
// $('a[href^="#"]').on('click', function(e) {
//
//     $.extend($.easing, {
//       def: 'easeInOutQuart',
//         easeInOutQuart: function (x, t, b, c, d) {
//           if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
//           return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
//         }
//       });
//
//
// 	    e.preventDefault();
//
// 	    var target = this.hash;
// 	    var $target = $(target);
//
// 	    $('html, body').stop().animate({
// 	        'scrollTop': $target.offset().top -114
// 	    }, 500, 'easeInOutQuart', function () {
// 	        window.location.hash = target;
// 	    });
// 	});


}());

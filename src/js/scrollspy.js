/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */


// Scroll Spy
//var ScrollSpy = require('scrollspy');

(function(){

    "use strict";

    // Cache selectors
    var lastId,
        $topMenu = $('[data-subnavigation]'),
        topMenuHeight = $topMenu.outerHeight()+70,

        // All list items
        menuItems = $topMenu.find("a"),

        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function(){
          var item = $($(this).attr("href"));
          if (item.length) {
              return item;
          }

        });

        //console.log(topMenuHeight);

        $.extend($.easing, {
          def: 'easeInOutQuart',
            easeInOutQuart: function (x, t, b, c, d) {
              if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
              return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
            }
          });

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    menuItems.click(function(e){

        // /window.location.hash = this.hash;
      var href = $(this).attr("href"),
          offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;

          //console.log(href);

          $('html, body').stop().animate({
              scrollTop: offsetTop
          }, 500, 'easeInOutQuart');

          e.preventDefault();

    });

    // Bind to scroll
    $(window).scroll(function(){

       // Get container scroll position
       var fromTop = $(this).scrollTop()+topMenuHeight;

       // Get id of current scroll item
       var cur = scrollItems.map(function(){
         if ($(this).offset().top < fromTop)
           return this;
       });

       // Get the id of the current element
       cur = cur[cur.length-1];
       var id = cur && cur.length ? cur[0].id : "";

       if (lastId !== id) {
           lastId = id;

           //console.log(id);

            if(history.replaceState) {
                history.replaceState(null, null, '#' + id);
                //history.pushState(null, null, id);
            } else {
                location.hash = '#' + hash;
            }

           // Set/remove active class
           menuItems
             .parent().removeClass("active")
             .end().filter("[href='#"+id+"']").parent().addClass("active");
       }
    });

}());

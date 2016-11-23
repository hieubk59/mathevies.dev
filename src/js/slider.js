/* global require */
/* global window */
/* global site_data */
/* jshint -W097 */

"use strict";
//Slick Slider
var slick = require('slickJS');

(function(){

    var $slider = $('[data-slider]');

  $slider.slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    adaptiveHeight: true,
    nextArrow: '<div class="next chevron right"><span class="sr-only">Next</span></div>',
    prevArrow: '<div class="prev chevron left"><span class="sr-only">Previous</span></div>',
  });

}());

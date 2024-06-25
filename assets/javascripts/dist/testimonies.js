(function () {
    'use strict';

    function Testimonies(element) {
      if (!element) return;
      var testimonyWindow = element.querySelector('.testimonies__window');
      var testimonies = element.querySelectorAll('.testimonies__testimony');
      var controlPrev = element.querySelector('.testimonies__control--prev');
      var controlNext = element.querySelector('.testimonies__control--next');
      if (!testimonyWindow || !testimonies.length || !controlPrev || !controlNext) return;
      var activeSlide = 0;

      var animateSlide = function animateSlide(i) {
        activeSlide = i;
        testimonyWindow.scrollLeft = activeSlide * getTestimonyWindowWidth();
        controlPrev.disabled = activeSlide > 0 ? false : true;
        controlNext.disabled = activeSlide + 1 >= totalSlides() ? true : false;
      };

      var getTestimonyWindowWidth = function getTestimonyWindowWidth() {
        return testimonyWindow.clientWidth;
      };

      var isMobile = function isMobile() {
        return window.innerWidth < 1000;
      };

      var totalSlides = function totalSlides() {
        return isMobile() ? testimonies.length : Math.ceil(testimonies.length / 2);
      };

      var next = function next() {
        if (activeSlide + 1 >= totalSlides()) {
          return;
        }

        animateSlide(activeSlide + 1);
      };

      var prev = function prev() {
        if (activeSlide < 1) {
          return;
        }

        animateSlide(activeSlide - 1);
      };

      controlNext.addEventListener('click', function (e) {
        e.preventDefault();
        next();
      });
      controlPrev.addEventListener('click', function (e) {
        e.preventDefault();
        prev();
      });
    }

    var testimonies = document.querySelectorAll('.testimonies');
    testimonies.forEach(function (testimony) {
      new Testimonies(testimony);
    });

})();

(function () {
    'use strict';

    var Header = function Header(element) {
      var hamburger = element.querySelector('.hamburger');
      var navChildrenToggles = element.querySelectorAll('.main-nav__children-toggle');
      hamburger.addEventListener('click', function (e) {
        e.preventDefault();

        if (element.classList.contains('nav-open')) {
          element.classList.remove('nav-open');
          element.classList.remove('nav-visible');
        } else {
          element.classList.add('nav-open');
          setTimeout(function () {
            element.classList.add('nav-visible');
          }, 1);
        }
      });
      navChildrenToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
          e.preventDefault();
          var parent = toggle.parentNode;

          if (parent.classList.contains('is-open')) {
            parent.classList.remove('is-open');
          } else {
            parent.classList.add('is-open');
          }
        });
      });
    };

    new Header(document.querySelector('.header'));

})();

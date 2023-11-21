(function () {
    'use strict';

    var Header = function Header(element) {
      var hamburger = element.querySelector('.hamburger');

      if (hamburger) {
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
      }
    };

    new Header(document.querySelector('.header'));

})();

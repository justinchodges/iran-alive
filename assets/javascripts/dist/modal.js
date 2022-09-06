(function () {
    'use strict';

    var Modal = function Modal(element) {
      var closeButton = element.querySelector('.modal__close');
      closeButton.addEventListener('click', function (e) {
        e.preventDefault();
        close();
      });

      var close = function close() {
        element.classList.remove('is-open');
      };

      var open = function open() {
        element.classList.add('is-open');
      };

      return {
        close: close,
        open: open
      };
    };

    document.querySelectorAll('.modal').forEach(function (modal) {
      new Modal(modal);
    });

})();

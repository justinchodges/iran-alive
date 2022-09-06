(function () {
    'use strict';

    var Statistic = function Statistic(_ref) {
      var element = _ref.element,
          speed = _ref.speed;
      var numberHolder = element.querySelector('.statistic__number');
      var number = parseInt(numberHolder.dataset.target.trim().replace(/,/g, ''));
      if (isNaN(number)) return;
      if (typeof speed !== 'number') speed = 200;
      var increment = Math.trunc(number / speed);

      var updateCount = function updateCount() {
        var count = parseInt(numberHolder.innerText.replace(/,/g, ''));

        if (count < number) {
          numberHolder.innerText = (count + increment).toLocaleString();
          setTimeout(updateCount, 1);
        } else {
          numberHolder.innerText = number.toLocaleString();
        }
      };

      var observer = new IntersectionObserver(function (entries, self) {
        entries.map(function (entry) {
          if (entry.intersectionRatio > 0) {
            updateCount();
            self.unobserve(entry.target);
          }
        });
      }, {
        rootMargin: '0px 0px 0px 0px',
        threshold: 0
      });
      observer.observe(element);
    };

    document.querySelectorAll('.statistic').forEach(function (statistic) {
      new Statistic({
        element: statistic,
        speed: 500
      });
    });

})();

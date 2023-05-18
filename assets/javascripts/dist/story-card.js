(function () {
    'use strict';

    (function () {
      function StoryCard(element) {
        var $card = $(element);
        var $summary = $card.find('.story-card__summary');
        $card.hover(function () {
          $summary.slideDown(200);
        }, function () {
          $summary.slideUp(200);
        });
      }

      var storyCards = document.querySelectorAll('.story-card');
      storyCards.forEach(function (card) {
        new StoryCard(card);
      });
    })();

})();

(function () {
    'use strict';

    var Modal = function Modal(_ref) {
      var element = _ref.element,
          onClose = _ref.onClose,
          onOpen = _ref.onOpen;
      var closeButton = element.querySelector('.modal__close');
      var initialScroll = 0;
      closeButton.addEventListener('click', function (e) {
        e.preventDefault();
        close();
      });

      var close = function close() {
        element.classList.remove('is-open');
        document.body.classList.remove('modal-is-open');
        document.body.style.marginTop = null;
        setTimeout(function () {
          window.scrollTo({
            top: initialScroll,
            behavior: 'auto'
          });
        }, 1);
        if (onClose) onClose();
      };

      var open = function open() {
        initialScroll = window.pageYOffset;
        document.body.classList.add('modal-is-open');
        document.body.style.marginTop = initialScroll * -1 + 'px';
        element.classList.add('is-open');
        if (onOpen) onOpen();
      };

      return {
        close: close,
        open: open
      };
    };

    (function () {
      document.querySelectorAll('.donate-form').forEach(function (donateForm) {
        new DonateForm(donateForm);
      });

      function DonateForm(element) {
        var state = {
          frequency: null,
          amount: null
        };
        var formId = element.dataset.formId;
        var modal = document.querySelector('.modal[data-modal="' + formId + '"]');
        var amountsOneTimeHolder = element.querySelector('.donate-form__card-amounts--one-time');
        var amountsMonthlyHolder = element.querySelector('.donate-form__card-amounts--monthly');
        var timesChecked = 0;
        var checkedInterval = null;

        var init = function init() {
          var salsaOneTimeAmounts = modal.querySelectorAll('.sli-oneTimeAmountRadio');
          var salsaOneTimeAmountOtherCheckbox = modal.querySelector('.sli-oneTimeAmountInput.sli-customAmount');
          var salsaMonthlyAmounts = modal.querySelectorAll('.sli-recurringAmountRadio');
          var salsaMonthlyAmountOtherCheckbox = modal.querySelector('.sli-recurringAmountInput.sli-customAmount');
          var salsaFrequency = modal.querySelector('.sli-selectRecurring .sli-input');
          var salsaNext = modal.querySelector('.sli-button[data-ignite-button-step="2"]');
          var salsaBack = modal.querySelector('.sli-button[data-ignite-button-step="1"]');
          var frequencies = element.querySelectorAll('.donate-form__frequency');
          var modalControls = new Modal({
            element: modal,
            onClose: function onClose() {
              return salsaBack.click();
            }
          });
          var submitButton = element.querySelector('.donate-form__card-submit');

          var submit = function submit() {
            modalControls.open();
            salsaNext.click();
          };

          submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            submit();
          });
          frequencies.forEach(function (frequency) {
            frequency.addEventListener('click', function (e) {
              e.preventDefault();
              frequencies.forEach(function (sibling) {
                if (sibling !== frequency) {
                  sibling.removeAttribute('selected');
                } else {
                  frequency.setAttribute('selected', 'selected');
                  state.frequency = frequency.value;
                }

                if (state.frequency === 'Give Monthly') {
                  element.classList.remove('is-one-time');
                  element.classList.add('is-monthly');
                  salsaFrequency.setAttribute('checked', 'checked');
                } else {
                  element.classList.remove('is-monthly');
                  element.classList.add('is-one-time');
                  salsaFrequency.removeAttribute('checked');
                }

                var event = new Event('change');
                salsaFrequency.dispatchEvent(event);
              });
            });
          });

          if (salsaFrequency.checked) {
            frequencies.forEach(function (frequency) {
              if (frequency.value === 'Give Monthly') frequency.click();
              return;
            });
          }

          salsaOneTimeAmounts.forEach(function (oneTimeAmount) {
            var amount = document.createElement('button');
            amount.classList.add('donate-form__card-amount');

            if (oneTimeAmount.dataset.igniteAmount) {
              amount.value = oneTimeAmount.dataset.igniteAmount;
              if (oneTimeAmount.getAttribute('checked')) amount.setAttribute('selected', 'selected');
              amount.innerHTML = "$".concat(parseInt(amount.value), " <span class=\"donate-form__card-amount-currency\">USD</span>");
            } else {
              amount.value = 'Other Amount';
              amount.innerHTML = "<span class=\"donate-form__card-amount-other-label\">Other Amount</span>\n                        <label class=\"donate-form__card-amount-other-holder\">\n                            <span class=\"donate-form__card-amount-other-symbol\">$</span>\n                            <input type=\"number\" class=\"donate-form__card-amount-other-input\" placeholder=\"Other\" min=\"1\" />\n                            <span class=\"donate-form__card-amount-other-currency\">USD</span>\n                        </label>";
            }

            amountsOneTimeHolder.append(amount);
          });
          salsaMonthlyAmounts.forEach(function (monthlyAmount) {
            var amount = document.createElement('button');
            amount.classList.add('donate-form__card-amount');

            if (monthlyAmount.dataset.igniteAmount) {
              amount.value = monthlyAmount.dataset.igniteAmount;
              if (monthlyAmount.getAttribute('checked')) amount.setAttribute('selected', 'selected');
              amount.innerHTML = "$".concat(parseInt(amount.value), " <span class=\"donate-form__card-amount-currency\">USD</span>");
            } else {
              amount.value = 'Other Amount';
              amount.innerHTML = "<span class=\"donate-form__card-amount-other-label\">Other Amount</span>\n                        <label class=\"donate-form__card-amount-other-holder\">\n                            <span class=\"donate-form__card-amount-other-symbol\">$</span>\n                            <input type=\"number\" class=\"donate-form__card-amount-other-input\" placeholder=\"Other\" min=\"1\" />\n                            <span class=\"donate-form__card-amount-other-currency\">USD</span>\n                        </label>";
            }

            amountsMonthlyHolder.append(amount);
          });
          var oneTimeAmounts = element.querySelectorAll('.donate-form__card-amounts--one-time .donate-form__card-amount');
          var oneTimeOther = element.querySelector('.donate-form__card-amounts--one-time .donate-form__card-amount-other-input');
          oneTimeAmounts.forEach(function (amount) {
            amount.addEventListener('click', function (e) {
              e.preventDefault();
              if (amount.getAttribute('selected')) return;
              oneTimeAmounts.forEach(function (sibling) {
                if (sibling === amount) {
                  salsaOneTimeAmounts.forEach(function (parent) {
                    if (parent.dataset.igniteAmount && parent.dataset.igniteAmount == amount.value) {
                      parent.click();
                    } else if (amount.value === 'Other Amount') {
                      salsaOneTimeAmountOtherCheckbox.click();
                      var event = new Event('blur');
                      salsaOneTimeAmountOtherCheckbox.dispatchEvent(event);
                    }
                  });
                  amount.setAttribute('selected', 'selected');
                  oneTimeOther.focus();
                } else {
                  sibling.removeAttribute('selected');
                }
              });
            });
          });
          oneTimeOther.addEventListener('keypress', function (e) {
            if (e.keyCode == 13) {
              submit();
            }
          });
          oneTimeOther.addEventListener('keyup', function () {
            salsaOneTimeAmountOtherCheckbox.value = oneTimeOther.value;
            var event = new Event('blur');
            salsaOneTimeAmountOtherCheckbox.dispatchEvent(event);
          });
          var monthlyAmounts = element.querySelectorAll('.donate-form__card-amounts--monthly .donate-form__card-amount');
          var monthlyOther = element.querySelector('.donate-form__card-amounts--monthly .donate-form__card-amount-other-input');
          monthlyAmounts.forEach(function (amount) {
            amount.addEventListener('click', function (e) {
              e.preventDefault();
              if (amount.getAttribute('selected')) return;
              monthlyAmounts.forEach(function (sibling) {
                if (sibling === amount) {
                  salsaMonthlyAmounts.forEach(function (parent) {
                    if (parent.dataset.igniteAmount && parent.dataset.igniteAmount == amount.value) {
                      parent.click();
                    } else if (amount.value === 'Other Amount') {
                      salsaMonthlyAmountOtherCheckbox.click();
                      var event = new Event('blur');
                      salsaMonthlyAmountOtherCheckbox.dispatchEvent(event);
                    }
                  });
                  amount.setAttribute('selected', 'selected');
                  monthlyOther.focus();
                } else {
                  sibling.removeAttribute('selected');
                }
              });
            });
          });
          monthlyOther.addEventListener('keypress', function (e) {
            if (e.keyCode == 13) {
              submit();
            }
          });
          monthlyOther.addEventListener('keyup', function () {
            salsaMonthlyAmountOtherCheckbox.value = monthlyOther.value;
            var event = new Event('blur');
            salsaMonthlyAmountOtherCheckbox.dispatchEvent(event);
          });
        };

        var check = function check() {
          timesChecked += 1;

          if (timesChecked > 100) {
            clearInterval(checkedInterval);
            return;
          }

          if (modal.querySelector('formtemplate')) {
            clearInterval(checkedInterval);
            init();
          } else {
            checkedInterval = setTimeout(function () {
              check();
            }, 100);
          }
        };

        check();
        return;
      }
    })();

})();

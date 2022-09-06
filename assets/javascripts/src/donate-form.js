import { Modal } from './../../../assets/javascripts/src/modal';

(function() {
    document.querySelectorAll('.donate-form').forEach((donateForm) => {
        new DonateForm(donateForm);
    });

    function DonateForm(element) {
        var state = {
            frequency: null,
            amount: null
        };

        const formId = element.dataset.formId;
        const modal = document.querySelector('.modal[data-modal="' + formId + '"]');
        
        const amountsOneTimeHolder = element.querySelector('.donate-form__card-amounts--one-time');
        const amountsMonthlyHolder = element.querySelector('.donate-form__card-amounts--monthly');
        let timesChecked = 0;
        let checkedInterval = null;

        const init = () => {
            const salsaOneTimeAmounts = modal.querySelectorAll('.sli-oneTimeAmountRadio');
            const salsaOneTimeAmountOtherCheckbox = modal.querySelector('.sli-oneTimeAmountInput.sli-customAmount');
            const salsaMonthlyAmounts = modal.querySelectorAll('.sli-recurringAmountRadio');
            const salsaMonthlyAmountOtherCheckbox = modal.querySelector('.sli-recurringAmountInput.sli-customAmount');
            const salsaFrequency = modal.querySelector('.sli-selectRecurring .sli-input');
            const salsaNext = modal.querySelector('.sli-button[data-ignite-button-step="2"]');
            const salsaBack = modal.querySelector('.sli-button[data-ignite-button-step="1"]');
            const frequencies = element.querySelectorAll('.donate-form__frequency');
            const modalControls = new Modal({
                element: modal,
                onClose: () => salsaBack.click()
            });

            const submitButton = element.querySelector('.donate-form__card-submit');
            const submit = () => {
                modalControls.open();
                salsaNext.click();
            };

            submitButton.addEventListener('click', function(e) {
                e.preventDefault();

                submit();
            });

            frequencies.forEach(function(frequency) {
                frequency.addEventListener('click', function(e) {
                    e.preventDefault();

                    frequencies.forEach(function(sibling) {
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

                        var evt = document.createEvent("HTMLEvents");
                        evt.initEvent("change", false, true)
                        salsaFrequency.dispatchEvent(evt);
                    });
                });
            });

            salsaOneTimeAmounts.forEach((oneTimeAmount) => {
                let amount = document.createElement('button');
                amount.classList.add('donate-form__card-amount');

                if (oneTimeAmount.dataset.igniteAmount) {
                    amount.value = oneTimeAmount.dataset.igniteAmount;
                    if (oneTimeAmount.getAttribute('checked')) amount.setAttribute('selected', 'selected');
                    amount.innerHTML = `\$${parseInt(amount.value)} <span class="donate-form__card-amount-currency">USD</span>`;
                } else {
                    amount.value = 'Other Amount';
                    amount.innerHTML = `<span class="donate-form__card-amount-other-label">Other Amount</span>
                        <label class="donate-form__card-amount-other-holder">
                            <span class="donate-form__card-amount-other-symbol">$</span>
                            <input type="number" class="donate-form__card-amount-other-input" placeholder="Other" min="1" />
                            <span class="donate-form__card-amount-other-currency">USD</span>
                        </label>`;
                }

                amountsOneTimeHolder.append(amount);
            });

            salsaMonthlyAmounts.forEach((monthlyAmount) => {
                let amount = document.createElement('button');
                amount.classList.add('donate-form__card-amount');

                if (monthlyAmount.dataset.igniteAmount) {
                    amount.value = monthlyAmount.dataset.igniteAmount;
                    if (monthlyAmount.getAttribute('checked')) amount.setAttribute('selected', 'selected');
                    amount.innerHTML = `\$${parseInt(amount.value)} <span class="donate-form__card-amount-currency">USD</span>`;
                } else {
                    amount.value = 'Other Amount';
                    amount.innerHTML = `<span class="donate-form__card-amount-other-label">Other Amount</span>
                        <label class="donate-form__card-amount-other-holder">
                            <span class="donate-form__card-amount-other-symbol">$</span>
                            <input type="number" class="donate-form__card-amount-other-input" placeholder="Other" min="1" />
                            <span class="donate-form__card-amount-other-currency">USD</span>
                        </label>`;
                }

                amountsMonthlyHolder.append(amount);
            });

            const oneTimeAmounts = element.querySelectorAll('.donate-form__card-amounts--one-time .donate-form__card-amount');
            const oneTimeOther = element.querySelector('.donate-form__card-amounts--one-time .donate-form__card-amount-other-input');

            oneTimeAmounts.forEach((amount) => {
                amount.addEventListener('click', (e) => {
                    e.preventDefault();

                    if (amount.getAttribute('selected')) return;

                    oneTimeAmounts.forEach((sibling) => {
                        if (sibling === amount) {
                            salsaOneTimeAmounts.forEach((parent) => {
                                if (parent.dataset.igniteAmount && parent.dataset.igniteAmount == amount.value) {
                                    parent.click();
                                } else if (amount.value === 'Other Amount') {
                                    salsaOneTimeAmountOtherCheckbox.click();
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

            oneTimeOther.addEventListener('keypress', (e) => {
                if (e.keyCode == 13) {
                    submit();
                }
            });

            oneTimeOther.addEventListener('keyup', () => {
                salsaOneTimeAmountOtherCheckbox.value = oneTimeOther.value;
            });

            const monthlyAmounts = element.querySelectorAll('.donate-form__card-amounts--monthly .donate-form__card-amount');
            const monthlyOther = element.querySelector('.donate-form__card-amounts--monthly .donate-form__card-amount-other-input');

            monthlyAmounts.forEach((amount) => {
                amount.addEventListener('click', (e) => {
                    e.preventDefault();

                    if (amount.getAttribute('selected')) return;

                    monthlyAmounts.forEach((sibling) => {
                        if (sibling === amount) {
                            salsaMonthlyAmounts.forEach((parent) => {
                                if (parent.dataset.igniteAmount && parent.dataset.igniteAmount == amount.value) {
                                    parent.click();
                                } else if (amount.value === 'Other Amount') {
                                    salsaMonthlyAmountOtherCheckbox.click();
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

            monthlyOther.addEventListener('keypress', (e) => {
                if (e.keyCode == 13) {
                    submit();
                }
            });

            monthlyOther.addEventListener('keyup', () => {
                salsaMonthlyAmountOtherCheckbox.value = oneTimeOther.value;
            });
        };

        const check = () => {
            timesChecked += 1;

            if (timesChecked > 100) {
                clearInterval(checkedInterval);
                return;
            }

            if (modal.querySelector('formtemplate')) {
                clearInterval(checkedInterval);
                init();
            } else {
                checkedInterval = setTimeout(() => {
                    check();
                }, 100);
            }
        };

        check();

        return;

        console.log(salsaOneTimeAmounts);

        setState();

        frequencies.forEach(function(frequency) {
            frequency.addEventListener('click', function(e) {
                e.preventDefault();

                frequencies.forEach(function(sibling) {
                    if (sibling !== frequency) {
                        sibling.removeAttribute('selected');
                    } else {
                        frequency.setAttribute('selected', 'selected');
                        state.frequency = frequency.value;
                    }

                    if (state.frequency === 'Give Monthly') {
                        titleMonthly.classList.remove('d-none');
                    } else {
                        titleMonthly.classList.add('d-none');
                    }
                });
            });
        });

        amounts.forEach(function(amount) {
            amount.addEventListener('click', function(e) {
                e.preventDefault();

                amounts.forEach(function(sibling) {
                    if (sibling !== amount) {
                        sibling.removeAttribute('selected');
                    } else {
                        amount.setAttribute('selected', 'selected');
                        setState();

                        if (amount.value === 'Other Amount') amountOther.focus();
                    }
                });
            });
        });

        submit.addEventListener('click', function(e) {
            e.preventDefault();

            setState();
            modalControls.open();
        });

        amountOther.addEventListener('keypress', (e) => {
            if (e.keyCode == 13) {
                submit();
                return;
            }
        });

        amountOther.addEventListener('keyup', () => {
            setState();
        });

        function setState() {
            frequencies.forEach(function(frequency) {
                if (frequency.getAttribute('selected')) state.frequency = frequency.value;
            });

            amounts.forEach(function(amount) {
                if (amount.getAttribute('selected')) state.amount = parseFloat( (amount.value === 'Other Amount' ? amountOther.value : amount.value ).replace(/,/g, '') );
            });
        }
    }
})();

const Statistic = ({
    element,
    speed
}) => {
    const numberHolder = element.querySelector('.statistic__number');
    const number = parseInt(numberHolder.dataset.target.trim().replace(/,/g, ''));
    if (isNaN(number)) return;
    if (typeof speed !== 'number') speed = 200;
    const increment = Math.trunc(number / speed);

    const updateCount = () => {
        const count = parseInt(numberHolder.innerText.replace(/,/g, ''));

        if (count < number) {
            numberHolder.innerText = (count + increment).toLocaleString();
            setTimeout(updateCount, 1);
        } else {
            numberHolder.innerText = number.toLocaleString();
        }
    };

    const observer = new IntersectionObserver((entries, self) => {
        entries.map((entry) => {
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

document.querySelectorAll('.statistic').forEach((statistic) => {
    new Statistic({
        element: statistic,
        speed: 500
    });
});
const Header = (element) => {
    const hamburger = element.querySelector('.hamburger');

    if (hamburger) {
        hamburger.addEventListener('click', (e) => {
            e.preventDefault();

            if (element.classList.contains('nav-open')) {
                element.classList.remove('nav-open');
                element.classList.remove('nav-visible');
            } else {
                element.classList.add('nav-open');

                setTimeout(() => {
                    element.classList.add('nav-visible');
                }, 1);
            }
        });
    }
};

new Header(document.querySelector('.header'));
const Header = (element) => {
    const hamburger = element.querySelector('.hamburger');
    const navChildrenToggles = element.querySelectorAll('.main-nav__children-toggle');

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

    navChildrenToggles.forEach((toggle) => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();

            const parent = toggle.parentNode;
            
            if (parent.classList.contains('is-open')) {
                parent.classList.remove('is-open');
            } else {
                parent.classList.add('is-open');
            }
        });
    });
};

new Header(document.querySelector('.header'));
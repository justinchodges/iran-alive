function Testimonies(element) {
    if (!element) return;

    const testimonyWindow = element.querySelector('.testimonies__window');
    const testimonies = element.querySelectorAll('.testimonies__testimony');
    const controlPrev = element.querySelector('.testimonies__control--prev');
    const controlNext = element.querySelector('.testimonies__control--next');

    if (!testimonyWindow || !testimonies.length || !controlPrev || !controlNext) return;

    let activeSlide = 0;

    const animateSlide = (i) => {
        activeSlide = i;
        testimonyWindow.scrollLeft = activeSlide * getTestimonyWindowWidth();

        controlPrev.disabled = activeSlide > 0 ? false : true;
        controlNext.disabled = activeSlide + 1 >= totalSlides() ? true : false;
    };

    const getTestimonyWindowWidth = () => {
        return testimonyWindow.clientWidth;
    }

    const isMobile = () => {
        return window.innerWidth < 1000;
    }

    const totalSlides = () => {
        return isMobile() ? testimonies.length : Math.ceil(testimonies.length / 2);
    };

    const next = () => {
        if (activeSlide + 1 >= totalSlides()) {
            return;
        }

        animateSlide(activeSlide + 1);
    }

    const prev = () => {
        if (activeSlide < 1) {
            return;
        }

        animateSlide(activeSlide - 1);
    }

    controlNext.addEventListener('click', (e) => {
        e.preventDefault();

        next();
    });

    controlPrev.addEventListener('click', (e) => {
        e.preventDefault();

        prev();
    });
}

const testimonies = document.querySelectorAll('.testimonies');

testimonies.forEach((testimony) => {
     new Testimonies(testimony);
});

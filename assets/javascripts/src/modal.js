export const Modal = ({element, onClose, onOpen}) => {
    const closeButton = element.querySelector('.modal__close');
    let initialScroll = 0;

    closeButton.addEventListener('click', (e) => {
        e.preventDefault();

        close();
    });

    const close = () => {
        element.classList.remove('is-open');
        document.body.classList.remove('modal-is-open');
        document.body.style.marginTop = null;

        setTimeout(function() {
            window.scrollTo({
                top: initialScroll,
                behavior: 'auto'
            });
        }, 1);
        
        if (onClose) onClose();
    };

    const open = () => {
        initialScroll = window.pageYOffset;
        document.body.classList.add('modal-is-open');
        document.body.style.marginTop = (initialScroll * -1) + 'px';
        element.classList.add('is-open');

        if (onOpen) onOpen();
    };

    return {
        close: close,
        open: open
    };
};

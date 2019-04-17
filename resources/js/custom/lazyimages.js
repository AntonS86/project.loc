export let lazyImage = () => {
    document.querySelectorAll('img').forEach(img => {
        if (img.dataset.src) {
            if (isVisible(img)) {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            }
        }
    });

};

let isVisible = (elem) => {
    let coords        = elem.getBoundingClientRect();
    let windowHeight  = document.documentElement.clientHeight;
    let topVisible    = coords.top > 0 && coords.top < windowHeight;
    let bottomVisible = coords.bottom < windowHeight && coords.bottom > 0;
    return topVisible || bottomVisible;
};

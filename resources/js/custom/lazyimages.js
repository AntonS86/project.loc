let lazyImage = () => {
    document.querySelectorAll('img').forEach(img => {
        if (img.dataset.src) {
            if (isVisible(img)) {
                img.src    = img.dataset.src;
                img.onload = () => img.removeAttribute('data-src');
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

lazyImage();
window.addEventListener('scroll', lazyImage);


/**
 * load images for ads list
 */
let imageAds = () => {
    let container = document.querySelector('.tab-content');
    if (!container) return;
    container.addEventListener('mouseover', (e) => {
        let li = e.target.closest('.slider-li-item');
        if (!li) return;
        li.closest('.slider-images').style.backgroundImage = `url(${li.dataset.img})`;
    });
};

imageAds();

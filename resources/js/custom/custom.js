import ErrorHandler from "./ErrorHandler";

let dataSort = {
    buttonId: '#button-sort',
    up      : {
        class: 'fa-arrow-up',
        sort : 'ASC'
    },
    down    : {
        class: 'fa-arrow-down',
        sort : 'DESC'
    }
};

let toggleButton = (obj) => {
    let button = document.querySelector(obj.buttonId);
    if (!button) return;
    button.addEventListener('click', (e) => {
        e.preventDefault();
        if (button.dataset.sort === obj.down.sort) {
            button.dataset.sort = obj.up.sort;
        } else {
            button.dataset.sort = obj.down.sort;
        }
        button.firstChild.classList.toggle(obj.down.class);
        button.firstChild.classList.toggle(obj.up.class);
    });
};

toggleButton(dataSort);

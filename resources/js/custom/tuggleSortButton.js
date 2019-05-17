let dataSort = {
    buttonId  : '#button-sort',
    form      : '#search_realestates',
    input_name: 'sort_by',
    up        : {
        class: 'fa-arrow-up',
        sort : 'ASC'
    },
    down      : {
        class: 'fa-arrow-down',
        sort : 'DESC'
    }
};

/**
 *
 * @param obj
 */
let toggleButton = (obj) => {
    let button = document.querySelector(obj.buttonId);
    let form   = obj.form ? document.querySelector(obj.form) : null;
    if (!button) return;
    button.addEventListener('click', (e) => {
        e.preventDefault();
        if (button.value === obj.down.sort) {
            button.value = obj.up.sort;
        } else {
            button.value = obj.down.sort;
        }
        if (form) form[obj.input_name].value = button.value;
        button.firstChild.classList.toggle(obj.down.class);
        button.firstChild.classList.toggle(obj.up.class);
    });
};

toggleButton(dataSort);


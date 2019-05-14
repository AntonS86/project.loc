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


let wishlist = () => {
    let main = document.querySelector('.main');
    if (!main) return false;
    main.addEventListener('click', (e) => {
        let link = e.target.closest('.wishlist');
        if (!link) return false;
        e.preventDefault();
        let span = link.querySelector('span');
        let text = link.dataset.text || null;
        axios.get(link.href)
            .then((response) => {
                if (response.status === 200) {
                    //console.log(response);
                    if (response.data.indexOf(+link.dataset.id) !== -1) {
                        classToggle(link.firstChild, 'fa-heart-o', 'fa-heart');
                        addText(span, '');
                    } else {
                        classToggle(link.firstChild, 'fa-heart', 'fa-heart-o');
                        addText(span, text);
                    }
                }
            })
            .catch((error) => {
                //console.log(error);
            });
    });
};

let classToggle = (elem, class1, class2) => {
    elem.classList.remove(class1);
    elem.classList.add(class2);
};

let addText = (elem, text) => {
    if (elem && text) {
        elem.innerHTML = text;
    }
};

wishlist();

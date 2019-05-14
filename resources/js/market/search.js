import ErrorHandler from "../custom/ErrorHandler";

/**
 *
 * @param data
 * @return {null}
 */
let searchAddress = (data) => {
    let form  = document.querySelector(data.form_id);
    let input = document.querySelector(data.input_id);
    let ul    = document.querySelector(data.ul_id);
    if (!(input && ul && form)) return null;
    let url = form.dataset.search_address;
    input.addEventListener('keyup', (e) => {
        form.street_id.value = '';
        let value            = input.value.trim();
        if (value) {
            axios.post(url, {
                street_name: value
            }).then((response) => {
                listBuilder(response, data);
            }).catch((error) => {
                new ErrorHandler().errorNotify(error);
            });
        } else {
            ul.hidden = true;
        }
    });


    ul.addEventListener('click', (e) => {
        let li = e.target.closest('li');
        if (!(li && li.dataset.id && li.innerHTML.trim())) return null;
        input.dataset.id     = li.dataset.id;
        input.value          = li.innerHTML.trim();
        form.street_id.value = li.dataset.id
        ul.hidden            = true;
    });
};

/**
 * build list ul
 * @param response
 * @param data
 */
let listBuilder = (response, data) => {
    let ul = document.querySelector(data.ul_id);
    if (!ul) throw Error(data.ul_id + ' not found, unable to build list');
    if (response.status === 200) {
        ul.hidden = false;
        for (let child of ul.children) {
            child.remove();
        }
        for (let elem of response.data) {
            ul.insertAdjacentHTML('beforeend', `<li data-id="${elem.id}">${elem.name}</li>`);
        }
    }
};


searchAddress({
    form_id : '#search_realestates',
    input_id: '#street_name',
    ul_id   : '#list-street'
});

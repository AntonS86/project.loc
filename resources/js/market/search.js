import ErrorHandler from "../custom/ErrorHandler";

/**
 *{form_id: '#form', field_name: 'input_name', field_id: 'input_hidden', ul_id: '#ul',[field_obligatory: 'input_obligatory']}
 * @param sett
 * @return {null}
 */
const searchAddress = (sett) => {
    const form = document.querySelector(sett.form_id);
    if (!form) return null;

    const input         = form[sett.field_name];
    const ul            = document.querySelector(sett.ul_id);
    let obligatoryInput = null;
    if (sett.field_obligatory) {
        obligatoryInput = form[sett.field_obligatory];
    }
    if (!(input && ul)) return null;
    const url = input.dataset.search_address;

    let timeOutId = null;

    input.addEventListener('keyup', (e) => {
        let value                 = input.value.trim();
        form[sett.field_id].value = '';

        if (value.length > 2) {
            if (timeOutId) clearTimeout(timeOutId);
            timeOutId = setTimeout(() => {

                const data = {[input.name]: value};

                if (obligatoryInput) {
                    if (+obligatoryInput.value > 0) {
                        data[obligatoryInput.name] = +obligatoryInput.value;
                    } else {
                        return;
                    }
                }
                axios.post(url, data).then((response) => {
                    listBuilder(response, sett);
                }).catch((error) => {
                    new ErrorHandler().errorNotify(error);
                });

            }, 500);

        } else {
            ul.hidden = true;
        }
    });


    ul.addEventListener('click', (e) => {
        let li = e.target.closest('li');
        if (!(li && li.dataset.id && li.innerHTML.trim())) return null;
        input.dataset.id          = li.dataset.id;
        input.value               = li.innerHTML.trim();
        form[sett.field_id].value = li.dataset.id;
        ul.hidden                 = true;
    });
};

/**
 * build list ul
 * @param response
 * @param sett
 */
let listBuilder = (response, sett) => {
    let ul = document.querySelector(sett.ul_id);
    if (!ul) throw Error(sett.ul_id + ' not found, unable to build list');
    if (response.status === 200) {
        ul.innerHTML = '';
        if (response.data.length > 0) {
            ul.hidden = false;

            for (let elem of response.data) {
                ul.insertAdjacentHTML('beforeend', `<li data-id="${elem.id}">${elem.name}</li>`);
            }
        } else {
            ul.hidden = true;
        }

    }
};


searchAddress({
    form_id   : '#search_realestates',
    field_name: 'street_name',
    field_id  : 'street_id',
    ul_id     : '#list-street'
});

//Поиск по улице
searchAddress({
    form_id         : '#form-edit',
    field_name      : 'street_name',
    field_id        : 'street_id',
    field_obligatory: 'city_id',
    ul_id           : '#list-street'
});

//поиск по региону
searchAddress({
    form_id   : '#form-edit',
    field_name: 'region_name',
    field_id  : 'region_id',
    ul_id     : '#list-region'
});

//Поиск по району
searchAddress({
    form_id         : '#form-edit',
    field_name      : 'area_name',
    field_id        : 'area_id',
    field_obligatory: 'region_id',
    ul_id           : '#list-area'
});

//Поиск по городу
searchAddress({
    form_id         : '#form-edit',
    field_name      : 'city_name',
    field_id        : 'city_id',
    field_obligatory: 'region_id',
    ul_id           : '#list-city'
});

//Поиск по округу
searchAddress({
    form_id         : '#form-edit',
    field_name      : 'district_name',
    field_id        : 'district_id',
    field_obligatory: 'city_id',
    ul_id           : '#list-district'
});

//Поиск по деревне
searchAddress({
    form_id         : '#form-edit',
    field_name      : 'village_name',
    field_id        : 'village_id',
    field_obligatory: 'area_id',
    ul_id           : '#list-village'
});

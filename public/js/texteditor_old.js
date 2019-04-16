(function () {


    let setting = {
        form               : document.querySelector('#formArticle'),
        url                : document.querySelector('#formArticle').action,
        csrf               : document.querySelector('input[name=_token]').value,
        method             : document.querySelector('input[name=_method]').value,
        articleId          : document.querySelector('input[name=articleId]').value,
        imageRegexp        : /^image\/(jpeg|jpg|png|gif)$/,
        imageNameRegexp    : /^[0-9a-zA-Zа-яА-яёЁ_-]*\.(jpeg|jpg|png|gif)$/i,
        input              : [
            '_method',
            'title',
            'desc',
            'meta_desc',
            'keywords',
            'category_id',
        ],
        inputNameImage     : 'image',
        inputNameTitleImage: 'titleImage',
        classNameAdd       : {
            'ql-align-center' : 'text-center',
            'ql-align-justify': 'text-justify',
            'ql-align-right'  : 'text-right'
        }
    };

    /**
     * объект с текстовыми данными, на сервер
     */
    let data = {};


    let quill = textEditor();
    quillImageHandler(quill, setting);
    addTitleImage('#titleImage', '#titleImagePreview');


    /**
     * обработка qill изображений
     * @param {Quill} quill
     * @param {obj} setting
     */
    function quillImageHandler(quill, setting) {
        quill.getModule('toolbar').addHandler('image', () => {
            let inputFile = document.createElement('input');
            inputFile.setAttribute('type', 'file');
            inputFile.multiple = true;
            inputFile.click();

            inputFile.addEventListener('change', function (e) {
                let files = e.target.files;
                if (files instanceof FileList && files.length > 0) {
                    for (let file of files) {
                        if (setting.imageRegexp.test(file.type) && setting.imageNameRegexp.test(file.name)) {
                            ajaxFileSave(file, setting.inputNameImage, setting, insertToEditor);
                        } else {
                            alertMessage('Не верное имя или формат файла');
                        }
                    }
                }
            });
        });
    }


    /**
     * вставка файла в редактор
     * @param {json} json
     */
    function insertToEditor(response) {
        if (response.image) {
            let range = quill.getSelection();
            quill.insertEmbed(range.index, 'image', response.image.asset_path, 'api');
            /* let img = new Image();
            img.src = response.image.asset_path;
            img.dataset.id = response.image.id; */

        } else {
            alertMessage('Ошибка загрузки файла');
        }
    }


    /**
     * сохранение файла на сервера
     * @param {File} file
     * @param {object} setting
     */
    function ajaxFileSave(file, inputName, setting, responseHandler) {
        let formData = new FormData();
        formData.append('_method', setting.method);
        formData.append(inputName, file);
        let ajax = new XMLHttpRequest();
        ajax.open('POST', setting.url, true);
        ajax.setRequestHeader('X-CSRF-TOKEN', setting.csrf);
        //ajax.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        ajax.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        ajax.responseType = 'json';
        ajax.onload       = function () {
            if (ajax.status === 200) {

                responseHandler(ajax.response);

            } else if (ajax.status === 422) {

                let errors = ajax.response.errors;
                for (let key in errors) {
                    errors[key].forEach(element => {
                        alertMessage(element);
                    });
                }
            } else {
                alertMessage('Ошибка сохранения файла на сервере, попробуйте авторизоваться');
            }
        }
        ajax.onerror      = function () {
            alertMessage('Ошибка сохранения файла на сервере');
        }
        ajax.send(formData);
    }


    /**
     * запуск текстового редактора quill с настройками
     */
    function textEditor() {
        if (selectorError('#editor')) {

            let Inline = Quill.import('blots/inline');

            class BoldBlot extends Inline {
            }

            BoldBlot.blotName = 'bold';
            BoldBlot.tagName  = 'b';

            class ItalicBlot extends Inline {
            }

            ItalicBlot.blotName = 'italic';
            ItalicBlot.tagName  = 'i';

            Quill.register(BoldBlot);
            Quill.register(ItalicBlot);


            let quill = new Quill('#editor', {
                theme   : 'snow',
                readOnly: false,
                modules : {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                        ['blockquote', 'code-block'],
                        [{'header': 1}, {'header': 2}],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'script': 'sub'}, {'script': 'super'}], // superscript/subscript
                        [{'indent': '-1'}, {'indent': '+1'}], // outdent/indent
                        [{'direction': 'rtl'}], // text direction
                        [{'header': [1, 2, 3, 4, 5, 6, false]}],
                        [{'color': []}, {'background': []}], // dropdown with defaults from theme
                        [{'align': []}],
                        ['link', 'image'],
                        ['clean'] // remove formatting button
                    ],
                },
            });
            //quill.enable();
            return quill;
        }
    }

    //поиск селектора
    function selectorError() {
        for (let key in arguments) {
            if (!document.querySelector(arguments[key])) {
                throw new Error('Селектор ' + arguments[key] + ' ненайден');
            }
        }
        return true;
    }


    /**
     * проверка загружаемого изображения и вставка в превью
     * @param {string} sTitleImg селектор загружаемого изображения
     * @param {string} sPreviewImg селектор изиображения preview
     */
    function addTitleImage(sTitleImg, sPreviewImg) {
        if (selectorError(sTitleImg, sPreviewImg)) {

            let inputTitleImage   = document.querySelector(sTitleImg);
            let titleImagePreview = document.querySelector(sPreviewImg);

            inputTitleImage.addEventListener('change', function (e) {
                let file = e.target.files;

                if (file[0] && setting.imageRegexp.test(file[0].type) && setting.imageNameRegexp.test(file[0].name)) {

                    loadTitleImage(file[0], function (result) {
                        let imgPreview        = document.querySelector('#titleImagePreview');
                        imgPreview.src        = result.image.asset_path;
                        imgPreview.dataset.id = result.image.id;
                    });

                } else {
                    alertMessage('Поддерживаемый формат изображения jpeg jpg png gif');
                    inputTitleImage.value = '';
                }
            });
        }
    }


    /**
     *
     * @param {object} file
     */
    async function loadTitleImage(file, collable) {
        let formData = new FormData();
        formData.append('_method', setting.method);
        formData.append(setting.inputNameTitleImage, file);

        let response = await fetch(setting.url, {
            method     : 'POST',
            credentials: 'include',
            headers    : {
                'X-CSRF-TOKEN'    : setting.csrf,
                'X-Requested-With': 'XMLHttpRequest',
            },
            body       : formData,
        });

        let result = await response.json();
        if (response.status == 200) {

            collable(result);
            //console.log(result);
            /*let imgPreview = document.querySelector('#titleImagePreview');
            imgPreview.src = result.image.asset_path;
            imgPreview.dataset.id = result.image.id;*/
        } else if (response.status == 422) {

            for (let key in result.errors) {
                result.errors[key].forEach(element => {
                    alertMessage(element);
                });
            }
        }
    }


    setting.form.addEventListener('submit', updateForm);

    /**
     * обновление статьи на сервере текстовой части
     * @param {event} e
     */
    function updateForm(e) {
        e.preventDefault();
        let data = dataPreparation(setting.form, setting.input);
        let json = JSON.stringify(data);

        let ajax = new XMLHttpRequest();
        ajax.open('POST', setting.url, true);
        ajax.setRequestHeader('X-CSRF-TOKEN', setting.csrf);
        ajax.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        ajax.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        ajax.responseType = 'json';
        ajax.onload       = function () {
            if (ajax.status === 200) {
                infoMessage(ajax.response.status);
            } else if (ajax.status === 422 && ajax.response.errors) {

                let errors = ajax.response.errors;
                for (let key in errors) {
                    errors[key].forEach(element => {
                        alertMessage(element);
                    });
                }
            } else {
                alertMessage('Ошибка сохранения данных на сервере, попробуйте авторизоваться');
            }
        }
        ajax.onerror      = function () {
            alertMessage('Ошибка сохранения данных на сервере');
        }
        ajax.send(json);
    }


    /**
     *
     * @param {dom} form
     * @param {Array} input
     */
    function dataPreparation(form, input) {
        for (let elem of input) {
            if (form[elem].value) {
                data[elem] = form[elem].value;
            }
        }
        getAllImges(data.title);
        status();
        textReplaceClass();
        //data.text = document.querySelector('.ql-editor').innerHTML;
        return data;
    }

    /**
     * добавляем классы css к тексту
     */
    function textReplaceClass() {
        let text = document.querySelector('.ql-editor');
        for (let needle in setting.classNameAdd) {
            let classElems = text.getElementsByClassName(needle);
            for (let elem of classElems) {
                elem.classList.add(setting.classNameAdd[needle]);
            }
        }
        data.text = text.innerHTML;
    }

    function status() {
        let status = document.querySelector('#status');
        if (status.checked) {
            data.status = 'published';
        } else {
            data.status = 'draft';
        }
    }

    /**
     * сбор всех ссылок на фото и редактирование img
     */
    function getAllImges(alt) {
        let images = document.querySelectorAll('.ql-editor img');
        let arr    = [];
        for (let img of images) {
            img.classList.add('img-fluid');
            img.classList.add('mx-auto');
            img.classList.add('d-block');
            img.alt   = alt;
            img.title = alt;
            arr.push(img.src);
        }

        data.allImages = arr;

    }

})();

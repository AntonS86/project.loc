import ImageWorkMessage from './ImageWorkMessage';
import Validation from '../custom/Validation';
import ErrorHandler from '../custom/ErrorHandler';
import Notify from '../custom/Notify';

class WorkMessageHandler {
    /**
     *
     */
    constructor() {
        this._form   = document.querySelector('#form-work-message');
        this._val    = new Validation();
        this._notify = new Notify();
    }

    /**
     *
     */
    send() {
        if (!this._form) return false;

        this._form.addEventListener('submit', (e) => {
            e.preventDefault();
            let data = this._inputValue();
            if (!data) return false;
            this._request(data);
        });
    }

    /**
     *
     * @return {boolean|object}
     * @private
     */
    _inputValue() {
        let work_id = this._form.querySelector('select[name="work_id"]').value;
        let name    = this._form.querySelector('input[name="name"]').value;
        let phone   = this._form.querySelector('input[name="phone"]').value;
        let message = this._form.querySelector('textarea[name="message"]').value;
        let images  = this._collectImages();
        let data    = {};

        data.work_id = (this._val.intValidate(work_id, 'Выберите пункт из списка')) ? work_id : null;
        data.name    = (this._val.stringValidate(name, 2, 30, 'Имя от 2 до 30 символов')) ? name : null;
        data.message = (this._val.stringValidate(message, 2, 500, 'Сообщение от 5 до 500 символов')) ? message : null;
        data.phone   = (this._val.phoneValidate(phone, 'Введите номер по шаблону')) ? phone : null;

        if (images != null && images.length > 0) data.images = images;

        if (!(data.work_id && data.name && data.message && data.phone)) {
            this._notify.alertMessage('Поля имя, телефон и сообщение обязательны для заполнения');
            return false;
        }

        return data;
    }

    /**
     *
     * @return {null|Array}
     * @private
     */
    _collectImages() {
        let imagesBlock = document.querySelector('#uploaded-photo');
        if (imagesBlock.children.length === 0) return null;
        let images = [];
        for (let elem of imagesBlock.children) {
            images.push(elem.dataset.image);
        }
        return images;
    }

    _request(data) {
        axios.post(this._form.action, data)
            .then((response) => {
                this._responseHandler(response);
            })
            .catch((error) => {
                new ErrorHandler().errorNotify(error);
            });
    }

    /**
     *
     * @param {Object} response
     * @return {boolean}
     * @private
     */
    _responseHandler(response) {
        if (! (response.status === 200 && response.data === true)) {
            this._notify.alertMessage('Проблемы на сервере, попробуйте позже');
            return false;
        }
        this._notify.infoMessage('Спасибо за сообщение, мы вам перезвоним');
        this._form.querySelector('input[name="name"]').value       = '';
        this._form.querySelector('input[name="phone"]').value      = '';
        this._form.querySelector('textarea[name="message"]').value = '';
        let blockImage = document.querySelector('#uploaded-photo');
        if (blockImage.children.length > 0) {
            blockImage.innerHTML = '';
        }
        blockImage.hidden = true;
    }
}

new WorkMessageHandler().send();

new ImageWorkMessage('#images-uploader').send();


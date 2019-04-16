import Notify from './Notify';

export default class Validation {

    constructor() {
        this._notify          = new Notify();
        this._imageRegexp     = /^image\/(jpeg|jpg|png|gif)$/;
        this._imageNameRegexp = /^[0-9a-zA-Zа-яА-яёЁ_-]*\.(jpeg|jpg|png|gif)$/i;
        this._phoneRegexp     = /^(\+7|7|8)?[0-9]{10}$/;
    }

    /**
     *
     * @param {FileList} images
     * @returns {boolean}
     */
    imageValidate(images) {
        if (!images) return false;
        if (!images instanceof FileList || images.length === 0) return false;

        for (let image of images) {
            if (!this._imageRegexp.test(image.type) && !this._imageNameRegexp.test(image.name)) {
                this._notify.alertMessage('Файл должен быть изображением');
                return false;
            }
        }
        return true;
    }


    /**
     *
     * @param str
     * @param min
     * @param max
     * @param message
     * @returns {boolean}
     */
    stringValidate(str, min, max, message) {
        str = str.trim();
        if (str.length >= min && str.length <= max) return true;
        this._notify.alertMessage(message);
        return false;
    }


    /**
     *
     * @param phone
     * @param message
     * @returns {boolean}
     */
    phoneValidate(phone, message) {
        if ( this._phoneRegexp.test(phone)) return true;
        this._notify.alertMessage(message);
        return false;
    }

    /**
     *
     * @param {int} int
     * @param {string} message
     * @returns {boolean}
     */
    intValidate(int, message) {
        if (/^[1-9]\d*$/.test(int)) return true;
        this._notify.alertMessage(message);
        return false;
    }
}

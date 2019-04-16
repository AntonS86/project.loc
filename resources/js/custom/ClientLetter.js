import Notify from './Notify';

class ClientLetter {

    /**
     *
     * @param {string} id
     */
    constructor(id) {
        this.form = document.querySelector(id);
        if (this.form == null) {
            throw new Error('Form not found / ${id}');
        }
        this.notify = new Notify();
        this.button = this.form.querySelector('input[type="submit"]');
        this.url    = this.form.action;
        this.name;
        this.phone;
        this.message;

    }


    run() {

        this.form.addEventListener('submit', (event) => {
            event.preventDefault();
            this._handler();
            if (!this._checkValue()) {
                return this.notify.alertMessage('Все поля обязательны для заполнения');
            }
            this._send();
        });

    }


    /**
     *
     * @private
     */
    _handler() {
        let name     = this.form.querySelector('input[name="name"]').value;
        let phone    = this.form.querySelector('input[name="phone"]').value;
        let message  = this.form.querySelector('textarea[name="message"]').value;
        this.name    = this._stringLength(name, 2, 30, 'Имя от 2 до 30 символов');
        this.message = this._stringLength(message, 5, 300, 'Сообщение от 5 до 300 символов');
        this.phone   = this._validPhone(phone, 'Номер, только цифры');
    }

    /**
     *
     * @param {string} str
     * @param {int} min
     * @param {int} max
     * @param {string} message
     * @returns {string|null}
     * @private
     */
    _stringLength(str, min, max, message) {
        if (str.length >= min && str.length <= max) return str;
        this.notify.alertMessage(message);
        return null;
    }

    /**
     *
     * @param {string} phone
     * @param {string} message
     * @returns {string|null}
     * @private
     */
    _validPhone(phone, message) {
        if (/^(\+7|7|8)?[0-9]{10}$/.test(phone)) return phone;
        this.notify.alertMessage(message);
        return null;
    }

    /**
     *
     * @returns {boolean}
     * @private
     */
    _checkValue() {
        return this.name && this.phone && this.message;
    }

    /**
     * send email
     * @private
     */
    _send() {
        this.button.disabled = true;
        let self             = this;
        axios.post(this.url, {
            name   : this.name,
            phone  : this.phone,
            message: this.message
        })
            .then(function (response) {
                self.notify.infoMessage('Ваше сообщение успешно отправленно');
                self._inputClean();
                self.button.disabled = false;
            })
            .catch(function (error) {
                if (error.response.status == 422) {
                    let errors = error.response.data.errors;
                    for (let key in errors) {
                        errors[key].forEach(element => {
                            self.notify.alertMessage(element);
                        });
                    }
                } else {
                    self.notify.alertMessage('Ошибка на сервере, попробуйте позже');
                }
                self.button.disabled = false;
            });
    }

    /**
     *
     * @private
     */
    _inputClean() {
        this.form.querySelector('input[name="name"]').value       = '';
        this.form.querySelector('input[name="phone"]').value      = '';
        this.form.querySelector('textarea[name="message"]').value = '';
    }
}

let letter = new ClientLetter('#sendmail');
letter.run();

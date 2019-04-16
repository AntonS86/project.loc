import Notify from './Notify';

export default class ErrorHandler {

    constructor() {
        this._notify = new Notify();
    }
    errorNotify(error) {
        if (error.response && error.response.status === 422) {
            let errors = error.response.data.errors;
            for (let key in errors) {
                errors[key].forEach(element => {
                    this._notify.alertMessage(element);
                });
            }
        } else {
            this._notify.alertMessage('Ошибка на сервере, попробуйте позже');
        }
    }
}

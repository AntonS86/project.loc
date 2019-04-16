
export default class Notify {

    constructor() {
        this.delay = 4000;
        this.x     = 20;
        this.y     = 100;
    }

    infoMessage(message) {
        $.notify({
            message: message
        }, {
            type  : 'info',
            delay : this.delay,
            offset: {
                y: this.y,
                x: this.x
            }
        });
    }

    alertMessage(message) {
        jQuery.notify({
            message: message
        }, {
            type  : 'danger',
            delay : this.delay,
            offset: {
                y: this.y,
                x: this.x
            }
        });
    }
}

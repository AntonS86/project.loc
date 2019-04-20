export default class Share {
    constructor() {
        this.width        = 600;
        this.heigth       = 500;
        this.top          = 100;
        this.left         = document.documentElement.clientWidth / 2 - this.width / 2;
        this.selector     = '#share';
        this.shareElement = null;
    }

    share() {
        this.shareElement = document.querySelector(this.selector);
        if (!this.shareElement) return false;
        this._listener();
    }

    _listener() {
        this.shareElement.addEventListener('click', (event) => {
            event.preventDefault();
            let link = event.target.closest('a');
            if (!link) return false;
            this._popUp(link);
        });
    }

    _popUp(link) {
        window.open(link.href, 'Поделиться', `width=${this.width}, 
                height=${this.heigth}, top=${this.top}, left=${this.left}`);
    }
}


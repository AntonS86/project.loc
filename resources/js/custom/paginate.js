import Notify from '../custom/Notify';

class Paginate {

    constructor() {
        this._notify = new Notify();
        this._main   = document.querySelector('.main');
        this._link   = null;
    }

    /**
     *
     */
    paginate() {
        if (!this._main) return;
        this._main.addEventListener('click', (event) => {
            this._link = event.target.closest('#pagination a');
            if (this._link && this._link.tagName === 'A') {
                this._request();
                event.preventDefault();
            }
        });
    }

    _request() {
        let self = this;
        axios.get(this._link.href)
            .then(function (response) {
                self._builder(response.data.content);
            })
            .catch(function (error) {
                console.log(error);
                self._notify.alertMessage('Технические работы на сервере');
            });
    }

    _builder(response) {
        let oldContent = this._main.querySelector('#paginate-content');
        this._uplift(oldContent.offsetTop);
        let template       = document.createElement('template');
        template.innerHTML = response.trim();
        let content        = template.content.querySelector('#paginate-content');

        oldContent.parentElement.replaceChild(content, oldContent);
    }

    _uplift(y) {
        $('html, body').animate({scrollTop: y}, 'slow');
    }
}


new Paginate().paginate();


import Notify from '../custom/Notify';

class PaginateArticles {

    constructor() {
        this._notify = new Notify();
        this._main   = document.querySelector('.main');
        if (! this._main) throw new Error('Pagination error');
        this._link;
    }

    paginate() {
        this._main.addEventListener('click', (event) => {
            this._link = event.target.closest('#pagination a');
            if (this._link && this._link.tagName == 'A') {
                this._request();
                event.preventDefault();
            }
        });
    }

    _request() {
        let self = this;
        axios.get(this._link.href)
            .then(function (response) {
                self._builder(response.data.articles);
            })
            .catch(function (error) {
                console.log(error);
                self._notify.alertMessage('Технические работы на сервере');
            });
    }

    _builder(response) {
        let oldArticles = this._main.querySelector('#articles');
        this._uplift(oldArticles.offsetTop);
        let template       = document.createElement('template');
        template.innerHTML = response.trim();
        let articles       = template.content.querySelector('#articles');

        oldArticles.parentElement.replaceChild(articles, oldArticles);
    }

    _uplift(y) {
        //window.scrollTo(0, y);
        $('html, body').animate({scrollTop: y}, 'slow');
    }
}

new PaginateArticles().paginate();

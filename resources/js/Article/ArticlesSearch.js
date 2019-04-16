export default class ArticlesSearch {

    constructor() {
        this._querystring = '';
        this._form        = document.querySelector('form[role="search"]');
        this._searchList  = document.querySelector('#search-list');

    }

    search() {
        if (!this._form || !this._searchList) {
            return false;
        }
        this._inputHandler();
    }

    _inputHandler() {
        this._form.addEventListener('submit', (event) => {
            event.preventDefault();
            let self = this;
            this._querystring = this._form.elements[0].value.trim();
            if (this._querystring.length === 0) return false;
            axios.get(this._form.dataset.action, {
                params: {
                    search: this._querystring
                }
            })
            .then(function (response) {
                self._listClean();
                self._listBuilder(response.data);
            })
            .catch(function (error) {
                console.log('Error search');
            });

        });
    }

    /**
     * clean nodeList
     * @private
     */
    _listClean() {
        let liNodes = this._searchList.querySelectorAll('li');

        for (let [key, li] of liNodes.entries()) {
            if (key === 0) continue;
            li.remove();
        }
    }

    /**
     *
     * @param {array} data
     * @private
     */
    _listBuilder(data) {
        let count = 5;
        for(let [key, elem] of data.entries()) {
            if (key > count) break;
            this._createLi(elem.article_link, elem.title);
        }
        if (data.length > 0 && data.length > count) {
            this._createLi(this._form.action + '?search=' + encodeURIComponent(this._querystring),
                `Результатов больше: ${count}`);
        }
    }

    /**
     *
     * @param {string} link
     * @param {string} title
     * @private
     */
    _createLi(link, title) {
        let li = document.createElement('li');
        let a = document.createElement('a');
        a.href = link;
        a.innerHTML = title;
        a.classList.add('text-dark');
        li.appendChild(a);
        li.classList.add('py-1');
        this._searchList.appendChild(li);
    }
}

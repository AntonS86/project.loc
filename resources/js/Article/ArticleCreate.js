'use strict';
import ImageTitleArticle from './ImageTitleArticle';
import {quill} from '../custom/quillEditor';
import ImageQuill from './ImageQuill';
import ErrorHandler from "../custom/ErrorHandler";
import Notify from '../custom/Notify';

class ArticleCreate {
    constructor() {
        this._form = document.querySelector('#form-article')
    }

    formSend() {
        this._form.addEventListener('submit', e => {
            e.preventDefault();
            this._upload(this._getInputValue());
        });
    }


    /**
     *
     * @private
     * return {Object}
     */
    _getInputValue() {
        let inputs = this._getInputName();
        let data   = {};
        for (let input of inputs) {
            if (this._form[input].value.trim()) {
                data[input] = this._form[input].value.trim();
            }
        }
        data.images     = this._getImges(data.title);
        data.status     = this._getStatus();
        data.text       = this._getText();
        data.titleImage = this._getTitleImage();
        for (let k in data) {
            if (data[k] === null) {
                delete data[k];
            }
        }
        return data;
    }

    _upload(data) {
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
     * @param {string} alt
     * @return {null|Array}
     * @private
     */
    _getImges(alt) {
        let images = document.querySelectorAll('.ql-editor img');
        let src = [];
        for (let img of images) {
            img.classList.add('img-fluid');
            img.classList.add('mx-auto');
            img.classList.add('d-block');
            img.alt   = alt;
            img.title = alt;
            src.push(img.src);
        }
        return src;
    }

    /**
     *
     * @return {string}
     * @private
     */
    _getStatus() {
        let status = document.querySelector('#status');
        return (status.checked) ? 'published' : 'draft';
    }

    /**
     *
     * @param {Object} className
     * @private
     */
    _getText() {
        let text = document.querySelector('.ql-editor');
        for (let [needle, addClass] of Object.entries(this._textClassName())) {
            let classElems = text.getElementsByClassName(needle);
            for (let elem of classElems) {
                elem.classList.add(addClass);
            }
        }
        return text.innerHTML;
    }

    _getTitleImage() {
        let titleImage = document.querySelector('#titleImagePreview');
        return (titleImage.dataset.id) ? +titleImage.dataset.id : null;
    }

    _responseHandler(response) {
        if (response.status !== 200 || response.data.length === 0) {
            new Notify().alertMessage('Ошибка обновления');
            return false;
        };
        new Notify().infoMessage('Статья обновлена');
    }


    /**
     *
     * @return {string[]}
     * @private
     */
    _getInputName() {
        return [
            '_method',
            'title',
            'desc',
            'meta_desc',
            'keywords',
            'category_id',
        ];
    }

    _textClassName() {
        return {
            'ql-align-center' : 'text-center',
            'ql-align-justify': 'text-justify',
            'ql-align-right'  : 'text-right'
        };
    }
}

new ImageTitleArticle().inputEvent();

new ImageQuill(quill).imageEvent();

new ArticleCreate().formSend();

import ErrorHandler from '../custom/ErrorHandler';
import Validation from "../custom/Validation";

export default class ImageQuill {
    /**
     *
     * @param {Quill} quill
     */
    constructor(quill) {
        this.quill   = quill;
        this._imgVal = new Validation();
    }

    /**
     *
     */
    imageEvent() {
        this.quill.getModule('toolbar').addHandler('image', () => {
            let inputFile = this._inputFileClick();
            inputFile.addEventListener('change', e => {
                let images = e.target.files;
                if (this._imgVal.imageValidate(images)) {
                    this._upload(this._buildFormData(images));
                }
            });
        });
    }

    /**
     *
     * @return {HTMLInputElement}
     * @private
     */
    _inputFileClick() {
        let inputFile = document.createElement('input');
        inputFile.setAttribute('type', 'file');
        inputFile.multiple = true;
        inputFile.click();
        return inputFile;
    }


    /**
     *
     * @param {FileList} images
     * @return {FormData}
     * @private
     */
    _buildFormData(images) {
        let formData = new FormData();
        let i        = 0;
        for (let image of images) {
            formData.append('images[' + i + ']', image);
            i++;
        }
        return formData;
    }

    /**
     *
     * @param {FormData} formData
     * @private
     */
    _upload(formData) {
        let url      = document.querySelector('#form-article').dataset.images_route;
        let progress = document.querySelector('#quill-upl-prog');
        let line     = progress.querySelector('#quill-prog-line');

        let config = {
            onUploadProgress: (progressEvent) => {
                progress.hidden      = false;
                let percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                line.style.width     = percentCompleted + '%';
            }
        };
        axios.post(url, formData, config)
            .then((response) => {
                progress.hidden = true;
                this._responseHandler(response);
            })
            .catch((error) => {
                progress.hidden = true;
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
        if (response.status !== 200 || response.data.length === 0) return false;

        for (let img of response.data) {
            let range = this.quill.getSelection();
            this.quill.insertEmbed(range.index, 'image', img.asset_path, 'api');
        }
    }
}

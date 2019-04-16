import ErrorHandler from '../custom/ErrorHandler';
import Validation from '../custom/Validation';


export default class ImageWorkMessage {
    /**
     *
     * @param {string} selector
     */
    constructor(selector) {
        this._inputFile = document.querySelector(selector);
        this._imgVal    = new Validation();
    }

    /**
     *
     */
    send() {
        this._imageDelete();
        this._inputEvent();
    }

    /**
     *
     * @private
     */
    _inputEvent() {
        this._inputFile.addEventListener('change', (e) => {
            let images = e.target.files;
            if (this._imgVal.imageValidate(images)) {
                this._upload(this._buildFormData(images));
            }
            this._inputFile.value = '';
        });
    }

    /**
     *
     * @param {FormData} formData
     * @private
     */
    _upload(formData) {
        let progress = document.querySelector('#upload-progress');
        let line     = progress.querySelector('#progress-line');
        let config   = {
            onUploadProgress: (progressEvent) => {
                progress.hidden      = false;
                let percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                line.style.width     = percentCompleted + '%';
            }
        };
        axios.post(this._inputFile.dataset.route, formData, config)
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
     * @param {number} id
     * @param {string} url
     * @return {string}
     * @private
     */
    _buildUploadImage(id, url) {
        return `<div class="uploader-images border rounded"
                 style="background-image: url('${url}');" data-image="${id}">
                <a href="#" class="close text-danger" aria-label="Close">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
            </div>`;
    }

    /**
     *
     * @param {Object} response
     * @return {boolean}
     * @private
     */
    _responseHandler(response) {
        if (response.status !== 200 || response.data.length === 0) return false;
        let block    = document.querySelector('#uploaded-photo');
        block.hidden = false;
        for (let img of response.data) {
            block.insertAdjacentHTML('beforeend', this._buildUploadImage(img.id, img.asset_thumbs_path));
        }
    }

    /**
     *
     * @private
     */
    _imageDelete() {
        document.querySelector('#uploaded-photo').addEventListener('click', (e) => {
            e.preventDefault();
            let link = e.target.closest('a');
            if (!link) return false;
            let parentLink = link.parentElement;
            let block      = parentLink.parentElement;
            block.removeChild(parentLink);
            if (block.children.length === 0) {
                block.hidden.true;
            }
        });
    }
}



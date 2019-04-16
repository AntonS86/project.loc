import Validation from '../custom/Validation';
import ErrorHandler from "../custom/ErrorHandler";

export default class ImageTitleArticle {
    /**
     *
     */
    constructor() {
        this._titleImage        = document.querySelector('#titleImage');
        this._titleImagePreview = document.querySelector('#titleImagePreview');
        this._imgVal            = new Validation();
    }


    inputEvent() {
        this._titleImage.addEventListener('change', (e) => {
            let images = e.target.files;
            if (this._imgVal.imageValidate(images)) {
                this._upload(this._buildFormData(images));
            }
            this._titleImage.value = '';
        })
    }

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
        axios.post(this._titleImage.dataset.route, formData, config)
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
        formData.append('image', images[0]);
        return formData;
    }

    /**
     *
     * @param {Object} response
     * @return {boolean}
     * @private
     */
    _responseHandler(response) {
        if (response.status !== 200 || response.data.length === 0) return false;
        let imgPreview        = document.querySelector('#titleImagePreview');
        imgPreview.src        = response.data.asset_path;
        imgPreview.dataset.id = response.data.id;
    }
}

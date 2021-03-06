export default class FormSearchMarket {
    /**
     * передается id формы
     * @param {object} data
     */
    constructor(settings) {
        this.settings = settings;
        this.form     = document.querySelector(this.settings.form_id);
        this.data     = {};
    }

    /**
     * @param {function} func
     * @return {boolean}
     */
    send(funcResp, funcError) {
        if (!this.form) return false;
        this._formHandler();
        const formData  = {};
        formData.method = this.settings.method || this.form.method;
        formData.url    = this.settings.url || this.form.action;
        if (formData.method.toLowerCase() === 'get') {
            formData.params = this.data;
        } else if (formData.method.toLowerCase() === 'post') {
            formData.data = this.data;
        }
        axios(formData).then(response => funcResp(response))
            .catch(error => funcError(error));
    }

    /**
     *
     * @private
     */
    _formHandler() {
        for (let field of this.settings.fieldsName) {
            if (this.form[field] instanceof Node && this.form[field].value.trim()) {
                this.data[field] = this.form[field].value.trim();
            } else if (this.form[field] instanceof RadioNodeList) {
                this._radioInputHandler(field);
            } else {
                this.data[field] = null;
            }
        }
    }

    /**
     *
     * @param field
     * @private
     */
    _radioInputHandler(field) {
        const radioNode = [];
        this.form[field].forEach((item) => {
            if (item.value.trim()) {
                radioNode.push(item.value.trim());
            }
        });
        if (radioNode.length > 0) this.data[field] = radioNode;
    }
}

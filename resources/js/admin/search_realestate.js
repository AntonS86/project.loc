import FormSend from '../custom/FormSend';
import ErrorHandler from "../custom/ErrorHandler";

const settings         = {
    form_id   : '#search_realestates',
    fieldsName: [
        '_token',
        'rubric_id',
        'type_id',
        'street_name',
        'street_id',
        'sort',
        'sort_by'
    ]
};
const searchRealestate = () => {
    const form = document.querySelector(settings.form_id);
    if (!form) return false;

    form.addEventListener('submit', e => {
        e.preventDefault();
        new FormSend(settings).send(response => {
            if (response.status === 200) {
                let oldContent     = document.querySelector('#paginate-content');
                let template       = document.createElement('template');
                template.innerHTML = response.data.content.trim();
                let content        = template.content.querySelector('#paginate-content');
                oldContent.parentElement.replaceChild(content, oldContent);
            }
        }, error => {
            new ErrorHandler().errorNotify(error);
        });

    });
};
searchRealestate();

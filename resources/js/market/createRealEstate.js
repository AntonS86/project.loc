import ImageUpload from './ImageUpload';
import FormSend from '../custom/FormSend';
import ErrorHandler from "../custom/ErrorHandler";


const settings         = {
    form_id   : '#form-edit',
    fieldsName: [
        '_token',
        'rubric_id',
        'type_id',
        'region_name',
        'region_id',
        'area_name',
        'area_id',
        'city_name',
        'city_id',
        'district_name',
        'district_id',
        'village_name',
        'village_id',
        'street_name',
        'street_id',
        'house_number',
        'room',
        'year',
        'floor',
        'floors',
        'balcony',
        'loggia',
        'total_square',
        'land_square',
        'description',
        'price',
        'cadastral_number',
        'status',
        'images[]'

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

new ImageUpload('#images-uploader').send();

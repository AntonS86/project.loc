<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SearchVillageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'village_name' => 'string|required',
            'region_id'    => 'nullable|int|exists:regions,id'
        ];
    }
}

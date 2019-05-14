<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SearchRealEstateRequest extends FormRequest
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
            'rubric_id'   => 'required|int|exists:rubrics,id',
            'type_id'     => 'int|nullable|exists:types,id',
            'street_name' => 'string|nullable',
            'street_id'   => 'int|nullable|exists:streets,id',
            'sort'        => 'string|required|in:created_at,price',
            'sort_by'     => 'string|required|in:ASC,DESC'
        ];
    }
}

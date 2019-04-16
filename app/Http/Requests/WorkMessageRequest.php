<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkMessageRequest extends FormRequest
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
            'work_id'  => 'required|int|exists:works,id',
            'name'     => 'required|string|min:2|max:30',
            'phone'    => 'regex:/^\+?[78]?[0-9]{10}$/',
            'message'  => 'required|string|min:5|max:300',
            'images'   => 'sometimes|required|array',
            'images.*' => 'int|exists:images,id'
        ];
    }
}

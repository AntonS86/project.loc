<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ArticleRequest extends FormRequest
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
            'images'      => 'array',
            'images.*'    => 'sometimes|required|string',
            'titleImage'  => 'sometimes|integer|exists:images,id',
            'title'       => 'sometimes|required|string',
            'desc'        => 'sometimes|required|string',
            'meta_desc'   => 'sometimes|required|string',
            'keywords'    => 'sometimes|regex:/(#[а-яё_-]\s*){1,5}/i',
            'category_id' => 'integer|exists:categories,id',
            'status'      => 'required|in:draft,published',
        ];
    }
}

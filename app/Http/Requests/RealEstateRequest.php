<?php


namespace App\Http\Requests;


use App\Rules\StreetExistsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RealEstateRequest extends FormRequest
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
            'realestate_id'    => 'nullable|exists:real_estates,id',
            'rubric_id'        => 'required|int|exists:rubrics,id',
            'type_id'          => 'required|int|exists:types,id',
            'region_name'      => 'required|string',
            'region_id'        => 'required|int|exists:regions,id',
            'area_name'        => 'nullable|required_without:city_name|string',
            'area_id'          => [
                'nullable',
                'int',
                Rule::exists('areas', 'id')
                    ->where('region_id', $this->input('region_id')),

            ],
            'city_name'        => 'nullable|required_without:village_name|string',
            'city_id'          => [
                'nullable',
                'int',
                Rule::exists('cities', 'id')
                    ->where('region_id', $this->input('region_id')),
            ],
            'street_name'      => 'nullable|required_with:city_name,village_name|string',
            'street_id'        => [
                'nullable',
                'int',
                app()->make(StreetExistsRule::class)
            ],
            'district_name'    => 'nullable|string',
            'district_id'      => [
                'nullable',
                'int',
                Rule::exists('districts', 'id')
                    ->where('city_id', $this->input('city_id')),
            ],
            'village_name'     => 'nullable|required_without:city_name|required_with:area_name|string',
            'village_id'       => [
                'nullable',
                'int',
                Rule::exists('villages', 'id')
                    ->where('area_id', $this->input('area_id')),
            ],
            'house_number'     => 'nullable|string',
            'rooms'            => 'nullable|int|min:1|max:20',
            'year'             => 'nullable|date_format:Y',
            'floor'            => 'nullable|int|min:1',
            'floors'           => 'nullable|int|gte:floor',
            'balcony'          => 'nullable|int|min:1|max:5',
            'loggia'           => 'nullable|int|min:1|max:5',
            'total_square'     => 'nullable|int|min:5',
            'land_square'      => 'nullable|int|min:100',
            'description'      => 'required|string',
            'price'            => 'required|int|min:50000',
            'cadastral_number' => 'nullable|string',
            'status'           => 'required|in:published,archived',
            'images'           => 'nullable|array',
            'images.*'         => 'int|exists:images,id'
        ];
    }
}

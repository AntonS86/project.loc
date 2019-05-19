<?php

namespace App\Rules;

use App\Models\Street;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class StreetExistsRule implements Rule
{
    /**
     * @var Street
     */
    private $street;
    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new rule instance.
     *
     * @param Request $request
     * @param Street  $street
     */
    public function __construct(Request $request, Street $street)
    {

        $this->street  = $street;
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = $this->street->where(function ($query) use ($value) {
            $query->where('id', $value);
            if ($this->request->has('city_id')) {
                $query->whereHas('cities', function ($query) {
                    $query->where('cities.id', $this->request->city_id);
                });
            } elseif ($this->request->has('village_id')) {
                $query->whereHas('villages', function ($query) {
                    $query->where('villages.id', $this->request->village_id);
                });
            }
        })->first();
        return ($result);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Поле :attribute не прошло проверку, отсутствует id города либо id поселка';
    }
}

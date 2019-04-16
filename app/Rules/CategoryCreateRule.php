<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class CategoryCreateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value == 0) return true;

        $category = Category::where('id', $value)->first();
        if (is_null($category)) return false;
        if ($category->alias === 'news') {
            return false;
        }

        return (! $category->parent);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Создайте новую или добавьте в родительскую категорию, кроме Новости';
    }
}

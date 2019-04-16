<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class CategoryUpdateRule implements Rule
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
        $category = Category::where('id', $value)->where('alias', '<>', 'news')->first();
        if (is_null($category)) return false;
        $categoryNews = Category::where('alias', 'news')->first();

        if ($categoryNews && $category->parent === $categoryNews->id) {
            return false;
        }

        return ($category->id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Нельзя изменить категорию Новости и ее дочерние категории';
    }
}

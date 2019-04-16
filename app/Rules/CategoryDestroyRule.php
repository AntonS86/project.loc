<?php

namespace App\Rules;

use App\Category;
use Illuminate\Contracts\Validation\Rule;

class CategoryDestroyRule implements Rule
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
        $categories = Category::whereIn('id', $value)->where('alias', '<>', 'news')->get();
        if ($categories->isEmpty()) return false;

        $categoryNews = Category::where('alias', 'news')->first();
        if (is_null($categoryNews)) return true;

        $filter = $categories->filter(function ($item) use ($categoryNews) {
            if ($item->id === $categoryNews->id || $item->parent === $categoryNews->id) return true;
        });

        return $filter->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Категория должна быть действующая, категорию Новости удалить нельзя';
    }
}

<?php


namespace App\Models\Category;

use Illuminate\Support\Str;
use App\Models\Category;

class SlugObserver
{
    /**
     * @param Category $category
     */
    public function creating(Category $category): void
    {
        $category->alias = Str::slug($category->title);
    }

    /**
     * @param Category $category
     */
    public function updating(Category $category): void
    {
        $category->alias = Str::slug($category->title);
    }
}

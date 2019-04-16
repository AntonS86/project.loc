<?php


namespace App\Models\Category;

use Illuminate\Support\Str;
use App\Models\Category;

class SlugObserver
{
    public function creating(Category $category)
    {
        $category->alias = Str::slug($category->title);
    }

    public function updating(Category $category)
    {
        $category->alias = Str::slug($category->title);
    }
}

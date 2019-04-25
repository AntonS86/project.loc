<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{

    public function getAdminMenu()
    {
        return collect([
            (object)[
                'title' => 'Главная',
                'path'  => route('home'),
                'icon'  => 'fa fa-home'
            ],
            (object)[
                'title' => 'Админка',
                'path'  => route('admin.admin.index'),
                'icon'  => 'fa fa-briefcase'
            ],
            (object)[
                'title' => 'Редактор елементов',
                'path'  => route('admin.element.index'),
                'icon'  => 'fa fa-cogs'
            ],
            (object)[
                'title' => 'Редактор статей',
                'path'  => route('admin.articles.index'),
                'icon'  => 'fa fa-pencil'
            ],
            (object)[
                'title' => 'Добавить статью',
                'path'  => route('admin.articles.create'),
                'icon'  => 'fa fa-plus-square-o'
            ],

        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getMenu()
    {
        $collection = collect();
        $collection->push((object)['title' => 'Главная', 'path' => route('home')]);
        $collection = $collection->merge(Category::parentWithChildren()->get());
        $collection->push((object)['title' => 'Контакты', 'path' => route('contacts')]);
        return $collection;
    }
}

<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{

    public function getAdminMenu()
    {
        return collect([
            (object)['title' => 'Главная', 'path' => route('home')],
            (object)['title' => 'Админка', 'path' => route('admin.adminIndex')],
            (object)['title' => 'Редактор елементов', 'path' => route('admin.elements.index')],
            (object)['title' => 'Редактор статей', 'path' => route('admin.articles.index')],
            (object)['title' => 'Добавить статью', 'path' => route('admin.articles.create')],

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

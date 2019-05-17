<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Collection;


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
                'icon'  => 'fa fa-file-text-o'
            ],
            (object)[
                'title' => 'Объявления',
                'path'  => route('admin.realestates.index'),
                'icon'  => 'fa fa-building'
            ],
            (object)[
                'title' => 'Добавить объявление',
                'path'  => route('admin.realestates.create'),
                'icon'  => 'fa fa-plus-square-o'
            ],

        ]);
    }

    /**
     * @return Collection
     */
    public function getMenu(): Collection
    {
        $collection = collect();
        $collection->push((object)['title' => 'Главная', 'path' => route('home')]);
        $collection = $collection->merge(Category::parentWithChildren()->get());
        $collection->push((object)['title' => 'Контакты', 'path' => route('contacts')]);

        $collection->transform(function ($item) {
            $this->active($item);
            return $item;

        });
        return $collection;
    }


    /**
     * @param $elem
     *
     * @return bool
     */
    private function active($elem): bool
    {
        $marker       = false;
        $elem->active = '';

        if ($this->isActive(($elem->path))) {
            $elem->active = 'active';
            $marker       = true;
        }

        if (isset($elem->children) && $elem->children->isNotEmpty()) {
            foreach ($elem->children as $child) {
                $marker = $this->active(($child));

                if ($marker) $elem->active = 'active';
            }
        }
        return $marker;
    }

    /**
     * @param $path
     *
     * @return bool
     */
    private function isActive($path): bool
    {
        return ($path === url()->current()) ? true : false;

    }


}

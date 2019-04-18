<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Спорт',
            'parent' => 0
        ]);

        Category::create([
            'title' => 'Бег',
            'parent' => 1
        ]);

        Category::create([
            'title' => 'Футбол',
            'parent' => 1
        ]);


        

        Category::create([
            'title' => 'Путешествия',
            'parent' => 0
        ]);

        Category::create([
            'title' => 'Африка',
            'parent' => 4
        ]);

        Category::create([
            'title' => 'Европа',
            'parent' => 4
        ]);

        Category::create([
            'title' => 'Новости',
            'parent' => 0
        ]);
    }
}

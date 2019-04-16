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
            'alias' => 'sport',
            'parent' => 0
        ]);

        Category::create([
            'title' => 'Бег',
            'alias' => 'running',
            'parent' => 1
        ]);

        Category::create([
            'title' => 'Футбол',
            'alias' => 'football',
            'parent' => 1
        ]);


        

        Category::create([
            'title' => 'Путешествия',
            'alias' => 'travels',
            'parent' => 0
        ]);

        Category::create([
            'title' => 'Африка',
            'alias' => 'africa',
            'parent' => 4
        ]);

        Category::create([
            'title' => 'Европа',
            'alias' => 'europe',
            'parent' => 4
        ]);

        Category::create([
            'title' => 'Новости',
            'alias' => 'news',
            'parent' => 0
        ]);
    }
}

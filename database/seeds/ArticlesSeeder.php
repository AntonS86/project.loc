<?php

use Illuminate\Database\Seeder;
use App\Article;
use Carbon\Carbon;

class ArticlesSeeder extends Seeder
{

    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('ru_RU');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $i = 0;
        while ($i++ < 200) {

            Article::create([
                'title'        => $this->faker->sentence(random_int(5, 10), true),
                'desc'         => $this->faker->sentence(random_int(10, 20), true),
                'text'         => $this->faker->text(5000),
                'meta_desc'    => $this->faker->sentence(random_int(8, 12), true),
                'category_id'  => random_int(1, 6),
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(120)->addDays(random_int(1, 120)),
            ]);
        }
    }
}

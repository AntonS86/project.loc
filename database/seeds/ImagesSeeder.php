<?php

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxArticle = Article::count();

        try {
            for ($i = 1; $i <= $maxArticle; $i++) {
                $path  = $this->faker->imageUrl(1280, 720) . '?' . md5(microtime());
                $image = Image::create([
                    'path' => $path
                ]);

                DB::table('article_image')->insert([
                    'article_id' => $i,
                    'image_id'   => $image->id,
                    'title'      => 'Y'
                ]);
            }
        } catch (Throwable $e) {
            print 'ERROR: ' . $e->getMessage();
        }

    }
}

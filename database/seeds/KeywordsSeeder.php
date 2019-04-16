<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use App\Models\Keyword;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class KeywordsSeeder extends Seeder
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

        $i = 0;
        while ($i++ < 100) {
            $name       = $this->faker->word;
            $alias      = Str::slug($name);

            try {

                $keyword = Keyword::Create([
                    'name'  => $name,
                    'alias' => $alias
                ]);

                for ($k = 0; $k < random_int(1, 10); $k++) {
                    DB::table('article_keyword')->insert([
                        'article_id' => random_int(1, $maxArticle),
                        'keyword_id' => $keyword->id
                    ]);
                }


            } catch (Throwable $e) {
                print 'Error ' . $e->getMessage() . "\n";
            }
        }

    }
}

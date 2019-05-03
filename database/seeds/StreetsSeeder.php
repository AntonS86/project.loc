<?php

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Street;

class StreetsSeeder extends Seeder
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
        while ($i++ < 1000) {
            try {
                $street = Street::create([
                    'name' => $this->faker->word . '-' . $this->faker->word . '-' . $this->faker->streetName
                ]);

            } catch (Throwable $e) {
                print 'Error ' . $e->getMessage() . "\n";
            }
        }
    }
}

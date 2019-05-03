<?php

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\City;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use App\Models\Street;

class CitiesSeeder extends Seeder
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
        $regions      = Region::get();
        $streetsCount = Street::count();

        foreach ($regions as $region) {
            $i = 0;
            while ($i++ < 5) {
                try {

                    $city = City::create([
                        'region_id' => $region->id,
                        'name'      => $this->faker->city . '-' . $this->faker->word
                    ]);
                } catch (Throwable $e) {
                    print 'Error ' . $e->getMessage() . "\n";
                }

                $j = 0;
                while ($j++ < 2) {
                    try {
                        District::create([
                            'city_id' => $city->id,
                            'name'    => $this->faker->colorName
                        ]);
                    } catch (Throwable $e) {
                        print 'Error ' . $e->getMessage() . "\n";
                    }
                }

                $k = 0;
                while ($k++ < 10) {
                    try {
                        DB::table('city_street')->insert([
                            'city_id'   => $city->id,
                            'street_id' => random_int(1, $streetsCount)
                        ]);
                    } catch (Throwable $e) {
                        print 'Error ' . $e->getMessage() . "\n";
                    }
                }
            }

        }
    }
}

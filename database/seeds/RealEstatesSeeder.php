<?php

use Illuminate\Database\Seeder;
use App\Models\RealEstate;
use App\Models\City;
use Faker\Factory;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Price;
use App\Models\Village;

class RealEstatesSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    /**
     * @var int
     */
    private $cityCount;

    /**
     * @var int
     */
    private $floors;

    /**
     * @var int
     */
    private $villageCount;


    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');;
        $this->cityCount    = City::count();
        $this->villageCount = Village::count();
        $this->floors       = random_int(1, 25);
    }


    public function run()
    {
        try {

            for ($i = 0; $i < 500; $i++) {

                $city    = City::where('id', random_int(1, $this->cityCount))
                               ->with([
                                   'districts',
                                   'streets'

                               ])->first();
                $village = Village::where('id', random_int(1, $this->villageCount))
                                  ->with([
                                      'area',
                                      'streets'
                                  ])->first();

                $this->makeApartment($city);
                $this->makeRoom($city);
                $this->makeDacha($village);
                $this->makeHouse($village);
                $this->makeLand($village);
            }
        } catch (Throwable $e) {
            print 'Error ' . $e->getMessage() . "\n";
        }
    }


    /**
     * создать квартиру
     *
     * @param City $city
     *
     * @throws Exception
     */
    private function makeApartment(City $city): void
    {
        $realEstate = RealEstate::create([
            'rubric_id'        => 1,
            'type_id'          => 1,
            'region_id'        => $city->region_id,
            'city_id'          => $city->id,
            'district_id'      => ($city->districts->random())->id,
            'street_id'        => ($city->streets->random())->id,
            'house_number'     => $this->generateHouseNumber(),
            'floors'           => $this->floors,
            'floor'            => random_int(1, $this->floors),
            'loggia'           => random_int(0, 1),
            'balcony'          => random_int(0, 1),
            'room'             => random_int(1, 5),
            'total_square'     => random_int(1, 100),
            'description'      => $this->faker->text(200),
            'status'           => 'published',
            'cadastral_number' => '00:00:000000',
            'price'            => random_int(500000, 6000000),
            'year'             => $this->faker->year(),
        ]);
        $image      = $this->makeImage();

        DB::table('image_real_estate')->insert([
            'image_id'       => $image->id,
            'real_estate_id' => $realEstate->id,
            'title'          => 'Y'
        ]);

        $this->setPrice($realEstate);
    }


    /**
     * комната
     *
     * @param City $city
     *
     * @throws Exception
     */
    private function makeRoom(City $city): void
    {
        $realEstate = RealEstate::create([
            'rubric_id'        => 1,
            'type_id'          => 2,
            'region_id'        => $city->region_id,
            'city_id'          => $city->id,
            'district_id'      => ($city->districts->random())->id,
            'street_id'        => ($city->streets->random())->id,
            'house_number'     => $this->generateHouseNumber(),
            'floors'           => $this->floors,
            'floor'            => random_int(1, $this->floors),
            'room'             => 1,
            'total_square'     => random_int(15, 22),
            'description'      => $this->faker->text(200),
            'status'           => 'published',
            'cadastral_number' => '00:00:000000',
            'price'            => random_int(500000, 6000000),
            'year'             => $this->faker->year(),
        ]);
        $image      = $this->makeImage();

        DB::table('image_real_estate')->insert([
            'image_id'       => $image->id,
            'real_estate_id' => $realEstate->id,
            'title'          => 'Y'
        ]);

        $this->setPrice($realEstate);
    }

    /**
     * @param Village $village
     *
     * @throws Exception
     */
    public function makeDacha(Village $village): void
    {
        $realEstate = RealEstate::create([
            'rubric_id'        => 1,
            'type_id'          => 3,
            'region_id'        => $village->area->region_id,
            'area_id'          => $village->area->id,
            'village_id'       => $village->id,
            'street_id'        => ($village->streets->random())->id,
            'house_number'     => $this->generateHouseNumber(),
            'floors'           => random_int(1, 2),
            'room'             => random_int(1, 4),
            'land_square'      => random_int(500, 3000),
            'total_square'     => random_int(40, 100),
            'description'      => $this->faker->text(200),
            'status'           => 'published',
            'cadastral_number' => '00:00:000000',
            'price'            => random_int(500000, 6000000),
            'year'             => $this->faker->year(),
        ]);
        $image      = $this->makeImage();

        DB::table('image_real_estate')->insert([
            'image_id'       => $image->id,
            'real_estate_id' => $realEstate->id,
            'title'          => 'Y'
        ]);

        $this->setPrice($realEstate);
    }

    /**
     * дом
     *
     * @param Village $village
     *
     * @throws Exception
     */
    public function makeHouse(Village $village): void
    {
        $realEstate = RealEstate::create([
            'rubric_id'        => 1,
            'type_id'          => 4,
            'region_id'        => $village->area->region_id,
            'area_id'          => $village->area->id,
            'village_id'       => $village->id,
            'street_id'        => ($village->streets->random())->id,
            'house_number'     => $this->generateHouseNumber(),
            'floors'           => random_int(1, 2),
            'room'             => random_int(1, 4),
            'land_square'      => random_int(500, 3000),
            'total_square'     => random_int(40, 100),
            'description'      => $this->faker->text(200),
            'status'           => 'published',
            'cadastral_number' => '00:00:000000',
            'price'            => random_int(500000, 6000000),
            'year'             => $this->faker->year(),
        ]);
        $image      = $this->makeImage();

        DB::table('image_real_estate')->insert([
            'image_id'       => $image->id,
            'real_estate_id' => $realEstate->id,
            'title'          => 'Y'
        ]);

        $this->setPrice($realEstate);
    }

    /**
     * участок
     *
     * @param Village $village
     *
     * @throws Exception
     */
    private function makeLand(Village $village): void
    {
        $realEstate = RealEstate::create([
            'rubric_id'        => 1,
            'type_id'          => 5,
            'region_id'        => $village->area->region_id,
            'area_id'          => $village->area->id,
            'village_id'       => $village->id,
            'street_id'        => ($village->streets->random())->id,
            'floors'           => random_int(1, 2),
            'land_square'      => random_int(500, 3000),
            'total_square'     => random_int(40, 100),
            'description'      => $this->faker->text(200),
            'status'           => 'published',
            'cadastral_number' => '00:00:000000',
            'price'            => random_int(500000, 6000000),
            'year'             => $this->faker->year(),
        ]);
        $image      = $this->makeImage();

        DB::table('image_real_estate')->insert([
            'image_id'       => $image->id,
            'real_estate_id' => $realEstate->id,
            'title'          => 'Y'
        ]);

        $this->setPrice($realEstate);
    }


    /**
     * @return Image
     */
    private function makeImage(): Image
    {
        return Image::create([
            'path' => $this->faker->imageUrl(1280, 720, 'abstract') . '?' . md5(microtime())
        ]);
    }

    private function setPrice(RealEstate $realEstate): void
    {
        Price::create([
            'real_estate_id' => $realEstate->id,
            'value'          => $realEstate->price
        ]);
    }

    private function generateHouseNumber()
    {
        $address = (string)random_int(1, 20);
        if ($var = random_int(0, 3)) {
            $address .= 'к' . $var;
        }
        return $address;
    }
}

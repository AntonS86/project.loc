<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesSeeder extends Seeder
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
        //Company::truncate();

        Company::create([
            'name'    => $this->faker->company(),
            'title'   => $this->faker->words(6, true),
            'img'     => 'bestproj.ico',
            'phone'   => $this->faker->phoneNumber(),
            'email'   => 'so4usertrue@gmail.com',
            'address' => $this->faker->address(),
        ]);
    }
}

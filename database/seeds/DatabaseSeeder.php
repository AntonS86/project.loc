<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
 
 
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SlidersSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(CompanyLinkSeeder::class);
        $this->call(OffersSeeder::class);
        $this->call(WorksSeeder::class);
        $this->call(KeywordsSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(RubricsSeeder::class);
        $this->call(StreetsSeeder::class);
        $this->call(RegionsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(RealEstatesSeeder::class);

    }
}

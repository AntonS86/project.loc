<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Квартира'],
            ['name' => 'Комната'],
            ['name' => 'Дача'],
            ['name' => 'Дом'],
            ['name' => 'Земельный участок'],
        ]);
    }
}

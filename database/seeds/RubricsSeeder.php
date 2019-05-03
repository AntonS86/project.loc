<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrics')->insert([
            ['name' => 'Продажа'],
            ['name' => 'Аренда'],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Works;

class WorksSeeder extends Seeder
{
    public function run()
    {
        Works::create([
            'name' => 'Купить'
        ]);

        Works::create([
            'name' => 'Продать'
        ]);

        Works::create([
            'name' => 'Аренда'
        ]);

        Works::create([
            'name' => 'Авто'
        ]);

        Works::create([
            'name' => 'Другое'
        ]);
    }
}

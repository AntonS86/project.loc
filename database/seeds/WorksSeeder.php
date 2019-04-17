<?php

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksSeeder extends Seeder
{
    public function run()
    {
        Work::create([
            'name' => 'Купить'
        ]);

        Work::create([
            'name' => 'Продать'
        ]);

        Work::create([
            'name' => 'Аренда'
        ]);

        Work::create([
            'name' => 'Авто'
        ]);

        Work::create([
            'name' => 'Другое'
        ]);
    }
}

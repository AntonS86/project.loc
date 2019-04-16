<?php

use Illuminate\Database\Seeder;
use App\Models\CompanyLink;

class CompanyLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyLink::create([
            'name' => 'facebook',
            'link' => 'facebook.com',
            'icon' => 'fa-facebook'
        ]);

        CompanyLink::create([
            'name' => 'instagram',
            'link' => 'instagram.com',
            'icon' => 'fa-instagram'
        ]);

        CompanyLink::create([
            'name' => 'telegram',
            'link' => 'telegram.com',
            'icon' => 'fa-telegram'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::create([
            'title' => 'Great elegant',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-building-o',
            'path'  => '#'
        ]);

        Offer::create([
            'title' => 'Porro ullam volu',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-map-signs',
            'path'  => '#'
        ]);

        Offer::create([
            'title' => 'Lorem dolor sit',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-money',
            'path'  => '#'
        ]);

        Offer::create([
            'title' => 'W3C Validated',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-gavel',
            'path'  => '#'
        ]);

        Offer::create([
            'title' => 'Unt in culpa qui',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-cc-visa',
            'path'  => '#'
        ]);

        Offer::create([
            'title' => '100% Responsive',
            'desc'  => 'Iure sequi unde hic. Sapiente quaerat sequi inventore  lorem ipsum dolor sit amet, consectetur.',
            'icon'  => 'fa-file-word-o',
            'path'  => '#'
        ]);
    }
}

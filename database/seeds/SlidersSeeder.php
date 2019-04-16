<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'img' => '001_1920_650.jpg',
            'desc' => '<span class="logo-font">The <span class="text-default">Project</span></span><br>Next Generation Template',
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam aliquid culpa offici, <br> tenetur fugiat dolorum sapiente eligendi...',
            'path' => 'articles/article-1'
        ]);

        Slider::create([
            'img' => '002_1920_650.jpg',
            'desc' => '<span class="logo-font">The <span class="text-default">Project</span></span> <br> Premium Bootstrap Template',
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam aliquid culpa offici, <br> tenetur fugiat dolorum sapiente eligendi...',
            'path' => 'articles/article-2'
        ]);

        Slider::create([
            'img' => '002_1920_650.jpg',
            'desc' => '<span class="logo-font">The <span class="text-default">Way</span></span> <br> new advance technologi',
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam aliquid culpa offici, <br> tenetur fugiat dolorum sapiente eligendi...',
            'path' => 'articles/article-3'
        ]);
    }
}

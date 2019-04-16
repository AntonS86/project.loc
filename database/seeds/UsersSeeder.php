<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Антон',
           'email' => 'so4usertrue@gmail.com',
           'email_verified_at' => now(),
           'password' => bcrypt('123456')
        ]);
    }
}

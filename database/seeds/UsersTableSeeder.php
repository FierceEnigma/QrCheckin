<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'company' => 'Fierce Enigma',
            'email' => 'jschwarz1993@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}

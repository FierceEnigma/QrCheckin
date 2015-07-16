<?php

use Illuminate\Database\Seeder;

class QrcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        foreach(range(1,20) as $index) {

            App\Qrcode::create([

                'name' => $faker->word,
                'description' => $faker->sentence,
                'user_id' => 1
            ]);
        }
    }
}

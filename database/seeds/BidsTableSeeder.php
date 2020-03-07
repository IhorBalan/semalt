<?php

use Illuminate\Database\Seeder;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $index) {
            \DB::table('bids')->insert([
                'id_event' => $faker->numberBetween(1,3),
                'name' => $faker->name,
                'email' => $faker->email,
                'price' => $faker->randomFloat(2,100,10000),
            ]);
        }
    }
}

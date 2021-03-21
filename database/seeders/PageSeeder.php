<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index){
            DB::table('pages')->insert([
                'title' => $faker->sentence(10),
                'body' => $faker->paragraph(11),
                //'publish' => $faker->boolean(50),
                'user_id' => $faker->numberBetween(1,10),
                'created_at' => $faker->dateTime('now')
            ]);
        }

    }
}

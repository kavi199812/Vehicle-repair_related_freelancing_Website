<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
       foreach (range(1,100) as $index){
           DB::table('customers')->insert([

               'email' => $faker->unique()->safeEmail,
               'name' => $faker->name,
               'password' => encrypt('password'),
               'created_at' => $faker -> dateTimeBetween('-6 month','+1 month')
           ]);
       }
    }
}

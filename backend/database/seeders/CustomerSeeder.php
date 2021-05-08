<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index)
        {
DB::table('customers')->insert([
    'fullname' => $faker->fullname,
    'username' => $faker->unique()->username,
     'email' => $faker->unique()->safeEmail,
     'address' => $faker->address,
     'phone' => $faker->phone,
     'password' => encrypt('password'),
     'gender' => $faker->gender,
     'created_at' => $faker->dateTimeBetween('-6 month','+1 month')
    

]);
        }

    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@laravel.loc',
            'password' => Hash::make('1q2w3e')
        ]);*/
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->userName(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->password(6, 10))
            ]);
        }
    }
}

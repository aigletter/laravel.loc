<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('orders')->insert([
                'user_id' => random_int(102, 182),
                'hash' => Hash::make(Str::random(6)),
                'title' => $faker->title(),
                'price' => $faker->randomFloat(2, 1, 100),
                'product_quantity' => random_int(1, 100),
                'address' => $faker->address(),
                'description' => $faker->text(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

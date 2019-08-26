<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
         AddressesTableSeeder::class,
         AttachmentsTableSeeder::class,
         CommentsTableSeeder::class,
         CuisinesTableSeeder::class,
         LikesTableSeeder::class,
         PromocodesTableSeeder::class
        ]);
    }
}

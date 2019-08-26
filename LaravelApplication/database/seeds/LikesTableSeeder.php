<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder seeds ReviewLikes
        factory(\App\Like::class, 5)->create();
    }
}

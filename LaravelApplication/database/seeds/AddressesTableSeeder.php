<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder to seed userAddress
        factory(Address::class, 5)->create();

        //seeder to seed RestaurantAddress
        factory(Address::class, 5)->create([
            'addressable_id' => function() {
                return Factory(\App\Restaurant::class)->create()->id;
            },
            'addressable_type' => 'App\Restaurant'
        ]);
    }
}

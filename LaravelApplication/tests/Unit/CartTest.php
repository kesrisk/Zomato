<?php

namespace Tests\Unit;

use App\Cuisine;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class CartTest extends TestCase
{
    /**
     * Authenticated user can add cuisine to cart
     *
     * @return void
     */
    public function test_a_user_can_add_cuisine_to_cart()
    {
        Passport::actingAs(
            factory(User::class)->create()->cart()->create()
        );

        $restaurant = Restaurant::create([
            'name'          => 'random name',
            'description'   => 'lorem ipsum',
            'phone_number'  => '9890099007',
        ]);

        $this->post('/api/restaurants/' . $restaurant['id'] . '/review', [
            'rating'    => 4,
            'text'      => 'this restaurant offers healthy food',
        ]);

        $cuisine = Cuisine::first();

        $this->post('/api/carts/' . $restaurant->id . '/' . $cuisine->id, [])->assertSeeText('successfully added to cart');

        $cartCuisines = $this->get('/api/carts/' . $restaurant->id)->decodeResponseJson();

        $this->assertCount(1, $cartCuisines);
    }
}

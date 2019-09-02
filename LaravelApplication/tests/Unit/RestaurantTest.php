<?php

namespace Tests\Unit;

use App\Restaurant;
use App\Address;
use App\Attachment;
use App\Cuisine;
use App\Review;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Passport\Passport;

class RestaurantTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * it would contain restaurant and address.
     *
     * @return void
     */
    public function test_create_a_new_restaurant()
    {
        $data = $this->createRestaurantFormGroup();

        $this->post('/api/restaurants', $data);

        $restaurant = Restaurant::latest()->first();

        $address = Address::latest()->first();


        $this->assertEquals($data['name'], $restaurant['name']);
        $this->assertEquals($data['description'], $restaurant['description']);
        $this->assertEquals($data['phone_number'], $restaurant['phone_number']);

        $this->assertEquals($data['street'], $address['street']);
        $this->assertEquals($data['district'], \App\District::findOrFail($address['district_id'])->name);
        $this->assertEquals($data['state'], \App\State::findOrFail($address['state_id'])->name);
    }

    /**
     * test to add a cuisine to restaurant and also get cuisines of a restaurant
     */
    public function test_add_cuisine_to_the_restaurant()
    {
        $restaurant = Factory(\App\Restaurant::class)->create();

        $data = $this->cuisineFormGroup($restaurant);

        $this->post('/api/cuisines', $data)->assertStatus(200);

        $cuisine = $restaurant->cuisines()->first();

        $this->assertEquals($data['name'], $cuisine['name']);
        $this->assertEquals($data['description'], $cuisine['description']);
        $this->assertEquals($data['cost'], $cuisine['pivot']['cost']);
    }

    /**
     * test to add a review to a restaurant
     */
    public function test_to_add_review_to_a_restaurant()
    {

        Passport::actingAs(
            factory(User::class)->create()
        );

        $restaurant = Factory(\App\Restaurant::class)->create();

        $reviewData = $this->reviewFormGroup();

        $this->post('/api/restaurants/' . $restaurant['id'] . '/review', $reviewData)->assertOk();

        $review = $restaurant->reviews()->first();

        $this->assertEquals($reviewData['rating'], $review['rating']);
        $this->assertEquals($reviewData['text'], $review['text']);

    }

    public function test_to_add_attachment_to_restaurant()
    {
        $this->withExceptionHandling();

        Passport::actingAs(
            factory(User::class)->create()
        );

        $restaurant = Factory(Restaurant::class)->create();

        $attachmentdata = $this->attachmentFormGroup();

        $this->post('/api/attachments/restaurants/' . $restaurant['id'], $attachmentdata);

        $attachment = Attachment::latest()->first();
        // $this->assertCount(1, $attachmentCount);
        $this->assertEquals($attachment['image_url'], $attachmentdata['image_url']);
    }


    public function createRestaurantFormGroup()
    {
        $restaurant = factory(Restaurant::class)->make();
        $address = factory(Address::class)->make();

        return [
            'name'          => $restaurant['name'],
            'description'   => $restaurant['description'],
            'phone_number'  => $restaurant['phone_number'],
            'street'        => $address['street'],
            'district'      => \App\District::findOrFail($address['district_id'])->name,
            'state'         => \App\State::findOrFail($address['state_id'])->name,
        ];
    }

    public function cuisineFormGroup($restaurant)
    {
        $cuisine = factory(Cuisine::class)->make();
        return [
            'name'          => $cuisine['name'],
            'description'   => $cuisine['description'],
            'cost'          => rand(100, 500),
            'restaurant_id' => $restaurant->id,
        ];
    }

    public function reviewFormGroup()
    {
        $review = factory(Review::class)->make();
        return [
            'rating'    => $review['rating'],
            'text'      => $review['text']
        ];
    }

    public function attachmentFormGroup()
    {
        $attachment = factory(Attachment::class)->make();
        return [
            'image_url' => $attachment['image_url']
        ];
    }


}

<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_can_register()
    {
        // $this->withoutExceptionHandling();

        $this->post("api/register", [
            'name' => 'test',
            'email' => 'shivamddwdw@gmail.com',
            'password' => 'qqqqqqqq',
            'password_confirmation' => 'qqqqqqqq',
            'phone_number' => '6564332456'
        ]);

        $user = User::all();
        $this->assertCount(1, $user);
    }


    public function test_a_user_can_log_in()
    {
        $this->post('api/login', [
            'email' => 'shivam@gmail.com',
            'password' => 'qqqqqqqq'
        ])->assertSee('token');
    }
}

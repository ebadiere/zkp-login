<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

//        $user = new User([
//            'name'     => 'testUser',
//            'email'    => 'test@email.com',
//            'password' => '123456'
//        ]);
//
//        $user->save();
    }

    /** @test */
    public function it_will_register_a_user()
    {
        $response = $this->post('api/register', [
            'name'     => 'testUser',
            'email'    => 'test@email.com',
            'password' => '123456'
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }

    /** @test */
    public function it_will_log_a_user_in()
    {
        $response = $this->post('api/auth/login', [
            'name'     => 'testUser',
            'email'    => 'test@email.com',
            'password' => '123456'
        ]);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }
//
//    /** @test */
//    public function it_will_not_log_an_invalid_user_in()
//    {
//        $response = $this->post('api/auth/login', [
//            'email'    => 'test@email.com',
//            'password' => 'notlegitpassword'
//        ]);
//
//        $response->assertJsonStructure([
//            'error',
//        ]);
//    }
}

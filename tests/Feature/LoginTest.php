<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testUserLogin()
    {
        $response = $this->from('/login')->post('/login');

        $response->assertStatus(302)
                 ->assertRedirect('/login');

    }

    public function testAdminLogin()
    {
        $response = $this->from('/admin/login')->post('/admin/login');

        $response->assertStatus(302)
                 ->assertRedirect('/admin/login');

    }
    public function testSiteManagerLogin()
    {
        $response = $this->from('/site_manager/login')->post('/site_manager/login');

        $response->assertStatus(302)
                 ->assertRedirect('/site_manager/login');

    }


}

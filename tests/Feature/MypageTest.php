<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\MypageController;

class MypageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMypageRedirect()
    {
        $response = $this->get('/mypage');

        $response->assertStatus(302);
    }


}

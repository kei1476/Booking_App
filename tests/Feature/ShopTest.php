<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ShopController;

class ShopTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShopName()
    {
        $shop_detail = new ShopController();

        $result = $shop_detail->detail(1);

        $shop = $result->shop;

        $this->assertEquals("仙人",$shop->name);
    }

    public function testShopArea()
    {
        $shop_detail = new ShopController();

        $result = $shop_detail->detail(1);

        $shop = $result->shop;

        $this->assertEquals("東京",$shop->area);
    }

    public function testSearch()
    {
        $search = $this->get('/shops',['search'=>'牛助']);

        $search->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopPageTest extends TestCase
{
    use RefreshDatabase;

   public function test_shop_page_screen_can_be_rendered()
    {
        $response = $this->get('/shop');

        $response->assertStatus(200);
    }

    public function test_all_categories_are_listed()
    {
        $category = Category::create([
            'name'=>'Category',
            'slug'=>'slug',
            'image'=>'path_to_image',
        ]);
        $response = $this->get('/shop');
        $response->assertSee($category->name);
    }

    public function test_products_can_be_filtered_by_category(){
        $response = $this->post('/shop/{id}');
        $response->assertStatus(200);
    }

    public function test_filtered_products_can_be_rendered(){
        $response = $this->get('/shop/{id}');
        $response->assertStatus(200);

    }
}

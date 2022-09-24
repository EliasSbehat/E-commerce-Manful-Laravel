<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_screen_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_featured_categories_are_visible()
    {
       $category =  Category::create([
            'name'=>'Category',
            'slug'=>'slug',
            'image'=>'path_to_image'
        ]);
        $response = $this->get('/');
        $response->assertSee($category->name);
    }

    public function test_featured_products_are_visible()
    {
        $category =  Category::create([
            'name' => 'Category',
            'slug' => 'slug',
            'image' => 'path_to_image'
        ]);
        $product =  Product::create([
            'name' => 'Product',
            'slug' => 'slug',
            'description'=>'some_description',
            'image' => 'path_to_image',
            'price'=>1,
            'category_id'=>$category->id,
        ]);
        $response = $this->get('/');
        $response->assertSee($product->name);
    }
}

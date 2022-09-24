<?php

namespace Tests\Feature;

use App\Http\Middleware\Authenticate;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    public function test_order_can_be_created()
    {
        $this->withoutMiddleware([Authenticate::class]);
        $this->withoutExceptionHandling();
        // $customer = new Customer([
        //     'firstname'=> 'firstname',
        //     'lastname'=> 'lastname',
        //     'phone'=> 12343334,
        //     'city'=>'Nairobi',
        //     'address'=>'Nairobi'
        // ]);
        
        $response = $this->post('checkout/store');
        $response->assertStatus(200);
    }
}

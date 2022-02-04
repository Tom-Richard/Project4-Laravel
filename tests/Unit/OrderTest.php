<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Orderitem;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    public function test_price()
    {
        //Arrange
        $this->seed();

        $customer = Customer::factory()->create();

        $order = Order::factory()->create([
            'customer_id' => $customer->id,
        ]);

        for ($i = 0; $i < 3; $i++) {
            $orderitem = new Orderitem();
            $orderitem->pizza()->associate(1);
            $orderitem->size()->associate(2);
            $orderitem->order()->associate($order);
            $orderitem->save();
            $orderitem->ingredients()->attach(1);
            $orderitem->ingredients()->attach(2);
            $orderitem->ingredients()->attach(3);
        }


        //Act
        $price = $order->price();

        //Assert
        $this->assertEquals(9.75, $price, "Optelling mislukt");
    }
}

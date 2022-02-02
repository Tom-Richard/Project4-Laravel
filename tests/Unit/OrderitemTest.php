<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderitemTest extends TestCase
{
    use RefreshDatabase;
    public function test_price()
    {
        //Arrange
        $this->seed();
        $orderitem = new Orderitem();
        $orderitem->pizza()->associate(1);
        $orderitem->size()->associate(2);
        $orderitem->save();
        $orderitem->ingredients()->attach(1);
        $orderitem->ingredients()->attach(2);
        $orderitem->ingredients()->attach(3);

        //Act
        $price = $orderitem->price();

        //Assert
        $this->assertEquals(3.25, $price, "Optelling mislukt");
    }
}

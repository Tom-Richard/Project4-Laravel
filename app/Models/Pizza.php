<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function ingredients()
    {
        // tweede parameter geeft de tussentabel (naam)/
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient', 'ingredientId', 'pizzaId');
    }

    public function orders()
    {
        // tweede parameter geeft de tussentabel (naam)
        return $this->belongsToMany(Order::class, 'pizza_order', 'orderId', 'pizzaId');
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function price()
    {
        $price = 0;
        foreach ($this->ingredients as $ingredient)
        {
            $price += $ingredient->price;

        }
        return $price;

    }

}

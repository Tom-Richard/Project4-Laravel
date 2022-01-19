<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function pizzas()
    {
        // tweede parameter geeft de tussentabel (naam)
        return $this->belongsToMany(Pizza::class, 'pizza_order', 'pizzaId', 'ingredientId');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}



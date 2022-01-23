<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'pizza';

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');;
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }

    public function price()
    {
        $price = 0;
        foreach ($this->ingredients as $ingredient)
        {
            $ingredientprice = $ingredient->price * $ingredient->pivot->quantity;
            $price +=  $ingredientprice;
        }
        return $price;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function ingredients()
    {
        // tweede parameter geeft de tussentabel (naam)/
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');;
    }

    public function orders()
    {
        // tweede parameter geeft de tussentabel (naam)
        return $this->belongsToMany(Order::class);
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
            $ingredientprice = $ingredient->price * $ingredient->pivot->quantity;
            $price +=  $ingredientprice;
        }
        return $price;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

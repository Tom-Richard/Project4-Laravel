<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function ingredients()
    {
        // tweede parameter geeft de tussentabel (naam)/


        return $this->belongsToMany(Ingredient::class, 'menu_ingredients', 'menu_id', 'ingredient_id');
    }
    public function price()
    {
        $price = 0;
        foreach ($this->ingredients as $ingredient)
        {
            $price += $ingredient->price100g;

        }
        return $price;

    }

}

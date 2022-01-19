<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Psy\debug;

class Ingredient extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function ingredients()
    {
        // tweede parameter geeft de tussentabel (naam)

        return $this->belongsToMany(Menu::class, 'pizza_ingredient', 'pizzaId', 'ingredientId');

    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}

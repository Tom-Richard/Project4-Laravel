<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->find($this->id)->tags()->detach();


        return redirect()->route('menus.index');
    }
}

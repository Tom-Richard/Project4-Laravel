<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\Size;




class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::where('is_custom', false)->get();
        $sizes = Size::all();

        //dd($pizzas[0]->price());
        return view('pizzas.index',compact('pizzas', 'sizes'));
    }

    public function edit($pizzaID)
    {
        $pizza = Pizza::findOrFail($pizzaID);

        $ingredienten = Ingredient::all();

        return view('pizzas.edit',compact('pizza','ingredienten'));

        //wordt vervolgt

    }

    public function store(Request $request)
    {
        $pizzaID = $request->input("pizzaID");
        $pizza = new Pizza;
        $selectedpizza = Pizza::findOrFail($pizzaID);
        $pizza->name = $selectedpizza->name;
        $pizza->is_custom = true;
        $pizza->save();

        foreach ($selectedpizza->ingredients as $ingredient)
        {
              $pizza->ingredients()->attach($ingredient);
        }

        return redirect()->route('pizza.edit', $pizza->id);
    }
    public function destroy(Request $request, $PizzaID)
    {
        $pizza = Pizza::find($PizzaID);
        $IngredientID = $request->input("ingredientID");

        $pizza->ingredients()->detach($IngredientID);

        return redirect()->route('pizza.edit', $PizzaID);
    }
    public function create(Request $request)
    {
        $PizzaID = $request->input("pizzaID");

        $pizza = Pizza::find($PizzaID);
        $IngredientID = $request->input("ingredientID");

        if (! $pizza->ingredients->contains($IngredientID)) {
            $pizza->ingredients()->attach($IngredientID);
        }

        return redirect()->route('pizza.edit', $PizzaID);

    }
}

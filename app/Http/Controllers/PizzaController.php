<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePizzaRequest;
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

        return view('pizza.index',compact('pizzas', 'sizes'));
    }

    public function edit($pizzaID)
    {
        $pizza = Pizza::findOrFail($pizzaID);
        $ingredienten = Ingredient::all()->except(1);
        $sizes = Size::all();

        if($pizza->user_id == auth()->user()->id)
        {
            return view('pizza.edit', compact('pizza', 'ingredienten', 'sizes'));
        }
        else
        {
            abort(403);
        }
    }

    public function store(StorePizzaRequest $request)
    {
        $validated = $request->validated();

        $selectedPizzaID = $request->input("pizzaID");
        $selectedPizza = Pizza::findOrFail($selectedPizzaID);
        $pizza = $selectedPizza->replicate()->fill([
           'is_custom' => true,
           'is_editable' => true,
           'user_id' => auth()->user()->id
        ]);
        $pizza->save();

        foreach ($selectedPizza->ingredients as $ingredient)
        {
            $selectedPizzaQuantity = $ingredient->pivot->quantity;
            $pizza->ingredients()->attach($ingredient, ['quantity' => $selectedPizzaQuantity]);
        }

        return redirect()->route('pizza.edit', $pizza->id);
    }
}

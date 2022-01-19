<?php

namespace App\Http\Controllers;

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
        $pizzas = Pizza::where('isCustom', false)->get();
        $ingredienten = Ingredient::all();
        $sizes = Size::all();
        return view('pizzas.index',compact('pizzas', 'sizes'));
    }
    public function edit($pizzaID)
    {
       /* $pizza = new Pizza;
        $selectedpizza = Pizza::findOrFail($pizzaID);
        $pizza->name = $selectedpizza->name;
        $pizza->iscustom = true;
        $pizza->save();*/
        //dd($pizza->name = $menu->findid($menu));
        //Dit is niet de EDIT van de menu tabel! Met deze functie kun je ingredienten aan pizza's toevoegen of van pizza's afhalen.
        //$ingredienten = Ingredient::all();
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
        $pizza->iscustom = true;
        $pizza->save();
        return redirect()->route('pizza.edit', $pizza->id);
    }
/*    public function destroy(Request $request, $menuID, $IngredientID)
    {
        $menu = Menu::find($menuID);
        $menu->ingredients()->detach($IngredientID);W

        return redirect()->route('pizzas.edit');
    }*/
}

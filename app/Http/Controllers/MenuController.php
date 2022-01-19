<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;
use App\Models\Ingredient;
use App\Models\Size;




class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $ingredienten = Ingredient::all();
        $sizes = Size::all();
        return view('menus.index',compact('menus', 'sizes'));
    }
    public function edit($pizzaID)
    {
        $pizza = new Menu;
        $selectedpizza = Menu::findOrFail($pizzaID);
        $pizza->name = $selectedpizza->name;
        $pizza->iscustom = true;
        $pizza->save();


        //dd($pizza->name = $menu->findid($menu));
        //Dit is niet de EDIT van de menu tabel! Met deze functie kun je ingredienten aan pizza's toevoegen of van pizza's afhalen.
        //$ingredienten = Ingredient::all();
        $menu = $pizza;
        $ingredienten = Ingredient::all();

        return view('menus.edit',compact('menu','ingredienten'));

        //wordt vervolgt

    }
/*    public function destroy(Request $request, $menuID, $IngredientID)
    {
        $menu = Menu::find($menuID);
        $menu->ingredients()->detach($IngredientID);W

        return redirect()->route('menus.edit');
    }*/
}

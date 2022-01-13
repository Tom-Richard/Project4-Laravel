<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;
use App\Models\Ingredient;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $ingredienten = Ingredient::all();

        foreach ($menus as $menu) {
            $ingredient = $menu->ingredients;
            echo $ingredient->sum('price100g');
            }
        //return view('menus.index',compact('menus'));
    }
    public function edit($menu)
    {
        //Dit is niet de EDIT van de menu tabel! Met deze functie kun je ingredienten aan pizza's toevoegen of van pizza's afhalen.
        //$ingredienten = Ingredient::all();
        $menu = Menu::find($menu);
        $ingredienten = Ingredient::all();
        return view('menus.edit',compact('menu','ingredienten'));

        //wordt vervolgt

    }
}

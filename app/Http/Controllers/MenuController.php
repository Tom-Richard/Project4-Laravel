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
        return view('menus.index',compact('menus'));
    }
    public function edit($menu)
    {
        //Dit is niet de EDIT van de menu tabel! Met deze functie kun je ingredienten aan pizza's toevoegen of van pizza's afhalen.
        $ingredienten = Ingredient::all();
        $menu = Menu::find($menu);
        foreach ($menu->ingredients as $ingredients) {
            echo $ingredients['ingredient'];
        }



        //return view('menus.edit',compact('ingredienten'));

        //wordt vervolgt

    }
}

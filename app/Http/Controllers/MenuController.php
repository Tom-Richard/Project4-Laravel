<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('menus.index',compact('menus'));
    }
}

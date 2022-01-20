<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPizzaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pizza_id)
    {
        $pizza = Pizza::findOrFail($pizza_id);
        Session::push('cart.pizzas', $pizza);
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pizza_id)
    {
        $pizzas = Session::get('cart.pizzas');
        unset($pizzas[$pizza_id]);
        Session::put('cart.pizzas', $pizzas);
        return redirect()->route('cart.index');
    }
}

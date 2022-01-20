<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricetotal = 0.00;
        $orderitems = Session::get('cart.orderitems');
        if($orderitems != null) {
            foreach ($orderitems as $orderitem) {
                $pricetotal += $orderitem->price();
            }
        }

        return view('order.index', compact('orderitems', 'pricetotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $orderitems = Session::get('cart.orderitems');
       if($orderitems != null) {
           $order = new Order();
           $order->customer_id = auth()->user()->id;

           $order->status()->associate(1);
           $order->save();

           foreach ($orderitems as $orderitem_id => $orderitem) {
                 $orderitem->order()->associate($order->id);
                 $orderitem->save();
           }
           Session::forget('cart.orderitems');
           return redirect()->route('order.show', $order->id);
       }
       else
       {
           return redirect()->route('pizza.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $pricetotal = 0.00;
        $orderitems = $order->orderitems;
        foreach($orderitems as $orderitem)
        {
            $pricetotal += $orderitem->price();
        }

        if($order->customer_id == auth()->user()->id)
        {
            return view('order.show', compact('orderitems', 'pricetotal', 'order'));
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

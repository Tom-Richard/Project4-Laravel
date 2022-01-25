<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricetotal = 0.00;
        $orderitems = Session::get('cart.orderitems');
        if($orderitems != null) {
            foreach ($orderitems as $orderitem) {
                $pricetotal += $orderitem->price();
            }
        }
        return view('order.create', compact('orderitems', 'pricetotal'));
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
           $customer = Customer::findOrFail(auth()->user()->id);
           $order = new Order();
           $order->customer_id = $customer->id;
           $order->save();
           $customer->increment('pizza_points', 10);

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
        if($order->customer_id == auth()->user()->id)
        {
            $pricetotal = 0.00;
            $orderitems = $order->orderitems;
            foreach($orderitems as $orderitem)
            {
                $pricetotal += $orderitem->price();
            }
            return view('order.show', compact('orderitems', 'pricetotal', 'order'));
        }
        else {
            abort(403);
        }
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
        $order = Order::findOrFail($id);
        if($order->customer_id == auth()->user()->id)
        {
            $order->status()->associate(6);
            $order->save();
            return redirect()->back();
        }
        else
        {
            return abort(403);
        }
    }
}

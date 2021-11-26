<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('products.orders')->with('orders', $orders);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('orders.index')->with('orders', $orders);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update($id)
    {
        $order = Order::find($id);

        $order->shipping_status =  "On The Way";
        if($order->save()){
            return back();
        }
    }

    public function complete($id)
    {
        $order = Order::find($id);

        $order->shipping_status =  "Item Arrived";
        if($order->save()){
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if($order->delete()){
            return back()
            ->with('success', 'Order is Canceled');
        }
    }
}

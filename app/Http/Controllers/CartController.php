<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use DB;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products =DB::table('carts')->where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        

        return view('products.cart')->with('products', $products);
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
        if($request->product_id){
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;

            if($cart->save()){
                return view('welcome');
            }
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
    public function update(Request $request)
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $items = "";

        $order = new Order();
        $order->shipping_status = "At the WareHouse";
        $order->total = $request->total;
        $order->user_id = Auth::user()->id;
        $order->items = $request->items;

        if($order->save()){
            $orders = DB::table('orders')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            Cart::where('user_id', Auth::user()->id)->delete();
            return view('products.orders')->with('orders', $orders);
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
        $cart = Cart::find($id);

        if($cart->delete()){
            return back();
        }
    }

    public function checkout(Request $request){
     

    }
}

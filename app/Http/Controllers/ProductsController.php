<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
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
        if($request->hasFile('image')){

            $product = new Product();
           $img = time()."_".$request->file('image')->getClientOriginalName();

            $request->image->move(public_path('products'), $img);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->image = $img;

            if($product->save()){
                return back()
                ->with('success','Product Added');
                
            }
        }else{
            return back()
            ->with('err','Please select Image');
            
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
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.update')->with('product', $product);
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
        if($request->hasFile('image')){

            $product = Product::find($id);
           $img = time()."_".$request->file('image')->getClientOriginalName();

            $request->image->move(public_path('products'), $img);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->brand = $request->brand;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->image = $img;

           

            if($product->save()){
                $products = Product::all();
                return view('products.index')
                ->with('successe','Product Updated')
                ->with('products', $products);
                
            }
        }else{
            return back()
            ->with('err','Please select Image');
            
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
        $product = Product::Find($id);
        
        if($product->delete()){
            $products = Product::all();
            return View('products.index')
            ->with('products', $products)
            ->with('successe','Product has been deleted');
           
        }
    }
}

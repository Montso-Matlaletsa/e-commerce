@php
    use App\Models\Product;
    $total = 0;
    $items = "";
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card" style="margin-left: 10px; margin-right: 10px">
            
            <div class="row">
                <div class="col m9">
                    <h5 class="col s6"><b>Shopping cart</b></h5>
                    <h5 class="col s6"><b><span class="right">{{$products->count()}} Items</span></b></h5>
                    <br />
                    <br />
                    <hr />  
                    
                    <div class="row">
                        <div class="col m6">
                            Product Details
                        </div>

                        <div class="col m2">
                            Quantity
                        </div>

                        <div class="col m2">
                            Price
                        </div>

                        <div class="col m2">
                            Total
                        </div>

                    </div>


                    @foreach ($products as $item)

                    @php
                        $product = Product::find($item->product_id);

                        $items .= $product->name.", ";
                     
                    @endphp
                    <div class="row">

                        <div class="col m6">
                            <div class="row">
                                <div class="col s4">
                                    <img class="blog-img" src={{ asset("/products/$product->image") }} width="100%" height="100px"/>
                                </div>
                                <div class="col s8">
                                    <h6><b>{{$product->name}}</b></h6>
                                    <h6 class="pink-text">{{$product->brand}}</h6>

                                    <form>
                                        <a href="/remove/{{$item->id}}" class="grey-text">Remove</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col m2">
                            <span class="center">{{$item->quantity}}</span>
                        </div>

                        <div class="col m2">
                            <span class="center">M {{$product->price}}</span>
                        </div>

                        <div class="col m2">
                            <span class="center">M {{$product->price * $item->quantity}}</span>
                        </div>

                    </div>
                            
                    @endforeach


                    <a href="#" class="blue-text"><i class="fa fa-backward"></i> Continue Shopping</a>


                </div>
                

                <div class="col m3 s12" style="background-color: rgb(41, 41, 41)">
                    <h5 class="center white-text"><span><b>Order Summary</b></span></h5>
                    <hr />

                    <div class="row">
                        <h6 class="col s6 white-text">ITEMS </h6>
                        <h6 class="col s6 white-text" ><span class="right">Total</span></h6>
                    </div>

                    <div class="row">
                        @foreach ($products as $item)
                        @php
                            $product = Product::find($item->product_id);
                            $total = $total + ($item->quantity * $product->price);
                        @endphp


                        <h6 class="col s6 white-text">{{$product->name}}   </h6>
                        <h6 class="col s2 white-text">x{{$item->quantity}}</h6>
                        <h6 class="col s4 white-text" ><span class="right">M {{$product->price * $item->quantity}}</span></h6>   
                        @endforeach
                    </div>

                          <br />
                          <br />
                          <br />
                          <br />
                          <br />
                          <br />
             

                        <div class="row">
                            <h6 class="col s6 white-text">TOTAL</h6>
                            <h6 class="col s6 white-text" ><span class="right">M {{$total}}</span></h6>
                        </div>

                        <form method="POST" action="/checkout" enctype="multipart/form-data">
                            {{Form::token()}}
                            <input type="hidden" name="items" value="{{$items}}" />
                            <input type="hidden" name="total" value="{{$total}}" />
                                @if ($total > 0)
                                <button  class="btn col s12 pink" style="margin-bottom: 100px">Checkout</button>
                                @endif
                            
                        </form>

                        
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection
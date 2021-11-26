@extends('layouts.app')

@section('content')
    <div class="row container">
        <h5 class="center">My Orders</h5>
        <hr />

        @if ($message = Session::get('success'))
        <div class="isa_success">
          <i class="fa fa-check"></i>
            Order Has Been Successfully Deleted
      </div>
      @endif

        <table class="striped">
            <thead>
              <tr>
                <th>Order Id</th>
                  <th>Items</th>
                  <th>Total Price</th>
                  <th>Shipping Status</th>
                  <th>Cancel Order</th>

              </tr>
            </thead>
    
            <tbody>

                @foreach ($orders as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->items}}</td>
                    <td>
                        M {{$item->total}}
                    </td>
                    <td>
                        @if ($item->shipping_status == "At the WareHouse")
                            <span class="red-text">{{$item->shipping_status}}</span>
                        @else
                            <span class="green-text">{{$item->shipping_status}}</span>
                        @endif
                        
                        </td>

                    <td>
                        @if ($item->shipping_status == "At the WareHouse")
                            <a class="btn orange" href="/cancel/{{$item->id}}">Cancel order</a>
                        @else
                        <a class="btn orange disabled" href="/cancel/{{$item->id}}">Cancel order</a>
                        @endif
                    </td>
                  </tr>             
                @endforeach


            </tbody>
          </table>
    </div>
@endsection
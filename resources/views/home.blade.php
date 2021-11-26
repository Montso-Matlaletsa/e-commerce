@extends('layouts.admin')

@section('content')
    <div class="row container">

                    <a href="#" data-target="slide-out" style="font-size: 30px;"
                     class="sidenav-trigger black-text"><i class="fa  fa-bars"></i></a>


                     <h5 class="center">Customers</h5>
                     <hr />

        <table>
            <thead>
              <tr>
                <th>Customer_Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Delete</th>
              </tr>
            </thead>
    
            <tbody>


              @if ($customers)
                @foreach($customers as $customer)  

                <tr>
                  <td>{{$customer->id}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->email}}</td>
                  <td><a href="/customer/delete/{{$customer->id}}" class="btn orange"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
                @endforeach 
              @else
                <tr><td>No Data...</td></tr>
              @endif
            </tbody>
          </table>
        

              
        </div>
 
@endsection

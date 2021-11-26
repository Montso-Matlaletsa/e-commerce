@extends('layouts.admin')

@section('content')
    <div class="row container">

        <a href="#" data-target="slide-out" style="font-size: 30px;"
            class="sidenav-trigger black-text"><i class="fa  fa-bars"></i>
        </a>

        <a class="modal-trigger btn pink right" href="#modal4" style="margin-top: 10px"
            >+ Add Product
      </a>

      @if ($message = Session::get('success'))
      <div class="isa_successe">
        <i class="fa fa-check"></i>
          Product Added Successfully
    </div>
    @endif

      @if ($message = Session::get('success'))
      <div class="isa_success">
        <i class="fa fa-check"></i>
          Product Added Successfully
    </div>
    @endif
    
    @if (count($errors) > 0)
    <div class="isa_error">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


                     <h5 class="center">Product Management</h5>
                     <hr />

        <table class="highlight" >
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Brand</th>
                  <th>Update</th>
                  <th>Delete</th>
              </tr>
            </thead>
    
            <tbody>
              @foreach($products as $product)  
              <tr>
                <td>{{$product->name}}</td>
                <td>M {{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->brand}}</td>
                <td><a href="/edit/{{$product->id}}" onclick="edit({{$product->id}})" class="btn "><i class="fa fa-pencil"></i> Edit</a></td>
                <td><a href="/product/delete/{{$product->id}}" class="btn orange"><i class="fa fa-trash-o"></i> Delete</a></td>
              </tr>
              @endforeach 

            </tbody>
          </table>
        

              
        </div>



        <div id="modal4" class="modal" style="margin-bottom: 50px; height: 400px">
          <div class="modal-content">
            <h5 class="center">Add New Product</h4>
              <hr />
  
              {{ Form::open(array('url' => '/addProduct', 'method' => 'post', 'encytype' =>'multipart/form-data' ,'files'=>'true')) }}
              {{Form::token()}}
  
              <div class="row">
                  <div class="col m4 s12">
                      <div class="file-upload col m12">
                          <button class="btn purple" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Product Image</button>
                        
                          <div class="image-upload-wrap">
                            <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                              <h3>Drop Image here</h3>
                            </div>
                          </div>
                          <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="btn red">Remove <span class="image-title">Uploaded Image</span></button>
                            </div>
                          </div>
                        </div>
  
                  </div>
                  <div class="col m8 s12">
  
                      <div class="input-field col s12">
                          <input id="first_name" name="name" type="text" class="validate">
                          <label for="first_name">Product Name</label>
                        </div>

                        <input type="hidden" id="p_id" name="id" />

                        <div class="input-field col s12">
                          <textarea  name="description"  class="materialize-textarea"></textarea>
                          <label for="first_name">Description</label>
                        </div>

                        <div class="input-field col s12">
                          <select name="category">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="electronic">Electronic & Appliances</option>
                            <option value="clothes">Fashion & Clothing</option>
                            <option value="music">Music & Intrumentals</option>
                            <option value="home">Home & Garden</option>
                            <option value="sports">Sports & Leisure</option>
                            <option value="computers">Mobile & Computers</option>
                
                          </select>
                          <label>Category</label>
                        </div>
                        
                      <div class="input-field col s12">
                          <input type="text"  name="price">
                          <label for="first_name">price</label>
                      </div>
  
                      <div class="input-field col s12">
                        <input type="text"  name="brand">
                        <label for="first_name">Brand</label>
                     </div>

                     <div class="input-field col s12">
                      <input type="number"  name="quantity">
                      <label for="first_name">Quantity</label>
                    </div>
                        
  
                        <div class="col s12">
                          <button type="submit" class="btn orange right">Add</button>
                        </div>
  
                      
                  </div>
  
                  </div>
  
                  
              </div>
              {{ Form::close() }}
           
          </div>



         
   
     
 
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row container">
        <div class="card col m10">
            <h5 class="center">Update Product</h4>
                <hr />
            
                <form method="POST" action="/updateProduct/{{$product->id}}" enctype="multipart/form-data">
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
                            <input id="p_name" name="name" type="text" class="validate" value="{{$product->name}}">
                            <label for="first_name">Product Name</label>
                          </div>
            
                          <div class="input-field col s12">
                            <textarea  name="description" id="p_desc"   class="materialize-textarea">{{$product->description}}</textarea>
                            <label for="p_desc">Description</label>
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
                            <input type="text"  id="p_price" name="price" value="{{$product->price}}">
                            <label for="p_price">price</label>
                        </div>
            
                        <div class="input-field col s12">
                          <input type="text" id="p_brand"  name="brand" value="{{$product->brand}}" >
                          <label for="first_name">Brand</label>
                       </div>
            
                       <div class="input-field col s12">
                        <input type="number" id="p_quantity"  name="quantity" value="{{$product->quantity}}">
                        <label for="first_name">Quantity</label>
                      </div>
                          
            
                          <div class="col s12">
                            <button type="submit" class="btn orange right">Update</button>
                          </div>
            
                        
                    </div>
            
                    </div>
            
                    
                </div>
            </form>
        </div>
    </div>
@endsection

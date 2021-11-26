@php
    use App\Models\Product;
    $products = DB::table('products')->where('category', 'music')->orderBy('created_at', 'DESC')->get();
     
@endphp
<div class="row">
    <div class="col m12 s12">
        <h5 class="center">Music And Intruments</h5>
        <hr />

        <div class="container">

            @foreach ($products as $item)
            <div class="col m3">


                <div class="blog-card" style="border: 1px solid pink">
                    <img class="blog-img" src={{ asset("/products/$item->image") }} />
                    <div class="text-overlay modal-trigger" onclick="getProduct({{$item->id}})" href="#modal1">
                        <h6 class="black-text">{{$item->name}}</h6> 
                        <h6 class="pink-text bold">M {{$item->price}}</h6> 
                        <p> 
                            {{$item->brand}}
                        </p>
                
                    </div>
                </div>
            </div>   
            @endforeach

        </div>
    </div>

</div>
@extends('layouts.front')

@section('page')
    
{{-- <a href="images/products/bg_1.jpg" class="hero-wrap hero-bread"></a> --}}

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('uploads/products/bg_1.jpg') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="{{ url('/shop')}}">Shop</a></span> <span>{{ $product->name }}</span></p>
          <h1 class="mb-0 bread">{{ $product->name }}</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mb-5 ftco-animate">
              <a href="{{ asset($product->image )}}" class="image-popup"><img src="{{ asset($product->image )}}" class="img-fluid" alt="Colorlib Template"></a>
              </div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                  <h3>{{ $product->name }}</h3>
                  <div class="rating d-flex">
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2">5.0</a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                          </p>
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                          </p>
                          <p class="text-left">
                              <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                          </p>
                      </div>
                    <p class="price" ><span>${{ $product->price }}</span></p>
                  <p>{!! $product->description !!}
                      </p>
                      <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group d-flex">
                    {{-- <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                        <option value="">Small</option>
                      <option value="">Medium</option>
                      <option value="">Large</option>
                      <option value="">Extra Large</option>
                    </select>
                  </div> --}}
                  </div>
                          </div>
                          <div class="w-100"></div>
                          
                          <form action="{{ route('cart.add') }}" method="post">
                            {{ csrf_field() }}

                            <div class="input-group col-md-8 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                   <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                  <i class="ion-ios-remove"></i>
                                   </button>
                                   </span>
                                <input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                   <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                                </span>
                             </div>
                          

                            {{-- <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                   <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                  <i class="ion-ios-remove"></i>
                                   </button>
                                   </span>
                                <input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                   <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                                </span>
                             </div> --}}
                             <div class="w-100"></div>
                             <div class="col-md-12">
                                 <p style="color: #000;">600 kg available</p>
                             </div>
                          <input type="hidden" name="pdt_id" value={{ $product->id }}>
                         </div>
                         {{-- <p><a href="" type="submit" class="btn btn-black py-3 px-5">Add to Cart</a></p> --}}
                         <p><button type="submit" class="btn add_to_cart btn-black py-3 px-5">Add to Cart</button></p>
                            </form>

              </div>
          </div>
      </div>

      <style>
        button {background: #000000;
    border: 1px solid #000000;
    color: #fff;
    cursor: pointer;}
      </style>
  </section>

  {{-- <section class="ftco-section">
      <div class="container">
              <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Products</span>
          <h2 class="mb-4">Related Products</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>   		
      </div>
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product">
                      <a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template">
                          <div class="overlay"></div>
                      </a>
                      <div class="text py-3 pb-4 px-3 text-center">
                          <h3><a href="#">Purple Cabbage</a></h3>
                          <div class="d-flex">
                              <div class="pricing">
                                  <p class="price"><span>$120.00</span></p>
                              </div>
                          </div>
                          <div class="bottom-area d-flex px-3">
                              <div class="m-auto d-flex">
                                  <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                      <span><i class="ion-ios-menu"></i></span>
                                  </a>
                                  <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                      <span><i class="ion-ios-cart"></i></span>
                                  </a>
                                  <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                      <span><i class="ion-ios-heart"></i></span>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> --}}

@endsection   

@section('js')
<script>
$(document).ready(function(){

  var quantitiy=0;
     $('.quantity-right-plus').click(function(e){
          
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
              
              $('#quantity').val(quantity + 1);

            
              // Increment
          
      });

       $('.quantity-left-minus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
        
              // Increment
              if(quantity>0){
              $('#quantity').val(quantity - 1);
              }
      });
      
  });
</script>
@endsection

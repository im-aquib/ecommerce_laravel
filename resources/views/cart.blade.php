@extends('layouts.front')


@section('page')

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('uploads/products/bg_1.jpg') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index')}}">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">My Cart</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="cart-list">
                      <table class="table">
                          <thead class="thead-primary">
                            <tr class="text-center">
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>Product name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach(Cart::content() as $pdt)

                            <tr class="text-center">
                                <td class="product-remove"><a href="{{ route('cart.delete', ['id' => $pdt->rowId ]) }}"><span class="ion-ios-close"></span></a></td>
                                
                                <td class="image-prod"><div class="img" style="background-image:url('{{ asset($pdt->model->image) }}');"></div></td>
                                
                                <td class="product-name">
                                    <h3>{{ $pdt->name }}</h3>
                                </td>
                                
                                <td class="price">${{ $pdt->price }}</td>
                                
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                     <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $pdt->qty }}" min="1" max="100">
                                  </div>
                              </td>
                                
                                <td class="total">${{ $pdt->subtotal }}</td>
                              </tr>
                                
                            @endforeach
                          </tbody>
                        </table>
                    </div>
              </div>
          </div>
          <div class="row justify-content-end">
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Cart Totals</h3>
                      {{-- <p class="d-flex">
                          <span>Subtotal</span>
                          <span>${{ $pdt->subtotal }}</span>
                      </p> --}}
                      <p class="d-flex">
                          <span>Delivery Charge</span>
                          <span>$0.00</span>
                      </p>
                      <hr>
                      <p class="d-flex total-price">
                          <span>Total</span>
                          <span>${{ number_format(Cart::total()) }}</span>
                      </p>
                  </div>
                  <p><a href="checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
              </div>
          </div>
          </div>
      </section>
    
@endsection
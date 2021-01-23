@extends('layouts.front')

@section('page')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('uploads/products/bg_1.jpg') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index')}}">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
          <div class="cart-detail cart-total p-3 p-md-4">
            <h3 class="billing-heading mb-4">Cart Total</h3>
            {{-- <p class="d-flex">
                      <span>Subtotal</span>
                      <span>$20.60</span>
                  </p> --}}
                  <p class="d-flex">
                      <span>Delivery</span>
                      <span>$0.00</span>
                  </p>
                  {{-- <p class="d-flex">
                      <span>Discount</span>
                      <span>$3.00</span>
                  </p> --}}
                  <hr>
                  <p class="d-flex total-price">
                      <span>Total</span>
                      <span>${{ number_format(Cart::total()) }}</span>
                  </p>
                  </div>
                  </div>
                  <div class="col-xl-5">
            <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Payment Method</h3>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio"  name="optradio" class="mr-2"> Credit Card</label>


                                             <span style="float: right;">
                                              <form action="{{ route('cart.check') }}" method="POST" >
                                                 {{ csrf_field() }}
                                                  <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                                                    data-key="pk_test_51ICK2JLvMjvQkhmZ3eFz05UNMHWGHLO1xlGsSm7jGpwoAyFZHzrJnwDyvFPaYAW5uMIVvDYykE27FAm3rUgjn3Oa00jg8ABdcQ"
                                                    data-amount="{{ Cart::total() * 100 }}"
                                                    data-name="VEGE MART"
                                                    data-description=""
                                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                    data-locale="auto"
                                                    data-zip-code="true">
                                                  </script>
                                              </form>
                                            </span> 


                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="checkbox">
                                             <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                          </div>
                                      </div>
                                  </div>
                                  <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        
                              </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>

    
  </section> <!-- .section -->

@endsection
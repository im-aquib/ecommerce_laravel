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
                    <!--- start of addresss -->
                    <form action="#" class="billing-form">
                      <h3 class="mb-4 billing-heading">Billing Details</h3>
                      <div class="row align-items-end">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstname">Firt Name</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="country">State / Country</label>
                            <div class="select-wrap">
                              <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                              <select name="" id="" class="form-control">
                                <option value="">France</option>
                                <option value="">Italy</option>
                                <option value="">Philippines</option>
                                <option value="">South Korea</option>
                                <option value="">Hongkong</option>
                                <option value="">Japan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="streetaddress">Street Address</label>
                            <input type="text" class="form-control" placeholder="House number and street name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="towncity">Town / City</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="postcodezip">Postcode / ZIP *</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="emailaddress">Email Address</label>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                          {{-- <div class="form-group mt-4">
                            <div class="radio">
                              <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                              <label><input type="radio" name="optradio"> Ship to different address</label>
                            </div>
                          </div> --}}
                        </div>
                      </div>
                    </form><!-- END -->
                  <!--- end of addresss -->

                  </div>
                  <div class="col-xl-5">
            <div class="col-md-12">

              <!-- start of cart -->

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
               
              <!--- end of cart -->
                {{-- <form action="" method="post"> --}}
                  <div class="cart-detail p-3 p-md-4">
                    <h3 class="billing-heading mb-4">Payment Method</h3>
                           
                                    {{-- <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                               <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                   
                                    <p>
                                      
                                      <span style="float: right;">
                                        <form action="{{ route('cart.check') }}" method="POST" >
                                          <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                   <label><input required type="radio"  name="optradio" class="mr-2"> Credit Card</label>
      
      
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
                                      {{-- <button --}}
                                      {{-- type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p> --}}
                  </div>
                {{-- </form> --}}
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
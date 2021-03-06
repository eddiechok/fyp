<?php 
    use App\Common;
?>
@extends('layout')

@section('title', 'Checkout')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

    <div class="container">
        <div class="spacer"></div>
        @if(session()->has('success_message'))
          <div class="alert alert-success">
            {{ session()->get('success_message')}}
          </div>
        @endif

        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="alert alert-danger" id="order_error" style="display:none">
        </div>
        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" id="payment-form" method="POST">
                    {{ csrf_field() }}
                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <!-- <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required> -->
                            {!! Form::select('state', Common::$states, old('state'), [
                                'id' => 'state',
                                'class' => 'form-control',
                                'placeholder' => '- Select State - ',
                                'required' => '',
                            ]) !!}
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="form-group">
                        <label for="payment_method">Pyament Method</label>
                        <div class="row container">
                            <div class="col-md-2">
                                <input type="radio" class="form-control" name="payment_method" value="Credit or Debit Card">
                            </div>
                            <div class="col-md-4">
                                Credit or Debit Card
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="form-control" name="payment_method" value="Cash on Delivery"> 
                            </div>
                            <div class="col-md-4">
                                Cash on Delivery
                            </div>
                        </div>
                    </div>

                    <div class="spacer"></div>

                    <div id="payment_details" style="display: none">
                        <h2>Payment Details</h2>

                        <div class="form-group">
                            <label for="name_on_card">Name on Card</label>
                            <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                        </div>
                        <div class="form-group">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                              <!-- A Stripe Element will be inserted here. -->
                            </div>
                          <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                    <!-- <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
                    </div> -->

                   <!--  <div class="form-group">
                        <label for="cc-number">Credit Card Number</label>
                        <input type="text" class="form-control" id="cc-number" name="cc-number" value="">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="expiry">Expiry</label>
                            <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/DD">
                        </div>
                        <div class="form-group">
                            <label for="cvc">CVC Code</label>
                            <input type="text" class="form-control" id="cvc" name="cvc" value="">
                        </div>
                    </div> --> <!-- end half-form -->

                    </div>
                    
                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>


                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->img_default) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->code }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->

                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>

                        @if(session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) |
                            <form action="{{  route('coupon.destroy') }}" method="POST" style="display: inline">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" style="font-size: 14px">Remove</button>
                            </form>
                             <br>
                             <hr>
                             New Subtotal
                             <br>
                        @endif
                        Tax <br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal() )}} <br>

                        @if(session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubTotal) }}
                            <br>
                        @endif
                        {{ presentPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>
                        <input type="hidden" id="newTotal" value="{{ $newTotal }}">

                    </div>
                </div> <!-- end checkout-totals -->

                @if(!session()->has('coupon'))
                    <a href="#" class="have-code">Have a Code?</a>

                    <div class="have-code-container">
                        <form action="{{  route('coupon.store') }}" method="POST">
                            {{  csrf_field() }}
                            <input type="text" name="coupon_code" id="coupon_code">
                            <button type="submit" class="button button-plain">Apply</button>
                        </form>
                    </div> <!-- end have-code-container -->
                @endif 
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script type="text/javascript">
        
        (function(){

            $('input[name="payment_method"]').on('change', function() {
                if(this.value == 'Credit or Debit Card') {
                    console.log(this.value);
                    $('#payment_details').show();
                }
                else {
                    console.log(this.value);
                    $('#payment_details').hide();
                }
            });

            $('#complete-order').on('click', function() {
                console.log($('#newTotal').val());
                if ($('#newTotal').val() > 0) {
                    $('#order_error').hide();
                    if($('input[name="payment_method"]:checked').val() == 'Cash on Delivery') {
                        $('#payment-form').submit();
                    }
                } else {
                    $('#order_error').html("The total of the order can't less than RM0.00").show();
                    $('html, body').animate({
                        scrollTop: $("#order_error").offset().top
                    }, 500);

                }
            });

            // Create a Stripe client.
                var stripe = Stripe('pk_test_EV6k0v3JYHSXvyA89Q6RbM1r');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                  base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                          color: '#aab7c4'
                      }
                      },
                      invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };

                // Create an instance of the card Element.
                var card = elements.create('card', {style: style, hidePostalCode: true});

                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                  var displayError = document.getElementById('card-errors');
                  if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                        displayError.textContent = '';
                }
                });

                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                  event.preventDefault();

                  //disable submit button
                  document.getElementById('complete-order').disabled = true;

                  var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('state').value,
                    address_zip: document.getElementById('postcode').value
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                      // Inform the user if there was an error.
                      var errorElement = document.getElementById('card-errors');
                      errorElement.textContent = result.error.message;
                        //disable submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                      // Send the token to your server.
                      stripeTokenHandler(result.token);
                  }
                  });
                });

                function stripeTokenHandler(token) {
                  // Insert the token ID into the form so it gets submitted to the server
                  var form = document.getElementById('payment-form');
                  var hiddenInput = document.createElement('input');
                  hiddenInput.setAttribute('type', 'hidden');
                  hiddenInput.setAttribute('name', 'stripeToken');
                  hiddenInput.setAttribute('value', token.id);
                  form.appendChild(hiddenInput);

                  // Submit the form
                  form.submit();
                } 
        })();
        
</script>
@endsection

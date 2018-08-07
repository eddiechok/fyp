@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    @component('components.breadcrumbs')    
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
    @endcomponent
    <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
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

            @if(Cart::count() > 0) 

                <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>

            <div class="cart-table">

                @foreach(Cart::content() as $item)

                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        
                            <a href="{{route('shop.show', $item->model->id)}}"><img src="{{ productImage($item->model->img_default) }}" alt="item" class="cart-table-img"></a>
                        
                        <div class="cart-item-details">
                            <div class="cart-table-item">
                                <a href="{{route('shop.show', $item->model->id)}}">
                                    {{$item->model->name}}
                                </a>
                            </div>
                            <div class="cart-table-description">{{$item->model->code}}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['cart.destroy', $item->rowId]]) }}
                                <button type="submit" class="cart-options" title="Remove Product from Cart"><i class="fa fa-trash-o" style="color: red; font-size: 24px;"></i></button>
                            {{ Form::close() }}
                            <!-- <a href="#"><i class="fa fa-star" style="font-size:24px;color:yellow"></i> Add to Wishlist</a> -->
                            {{ Form::open(['method' => 'POST', 'route' => ['cart.switchToWishlist', $item->rowId]]) }}
                                <button type="submit" class="cart-options" title="Add to Wishlist"><i class="fa fa-star" style="font-size:24px;color:yellow"></i></button>
                            {{ Form::close() }}
                        </div>
                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for($i = 1; $i <= $item->model->quantity_on_hand; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                                <!-- <option selected="">1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option> -->
                            </select>
                        </div>
                        <div style="text-align: right">{{ presentPrice($item->subtotal) }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

            <!-- <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="#">
                    <input type="text">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> --> <!-- end have-code-container -->

            <div class="cart-totals">
                <div class="cart-totals-left">
                    <div>
                        Subtotal <br>
                        Tax (5%) <br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <!-- Shipping is free because we’re awesome like that. :) -->
                </div>

                <div class="cart-totals-right">
                    <div class="cart-totals-subtotal">
                        {{ presentPrice(Cart::subtotal()) }}<br>
                        {{ presentPrice(Cart::tax())}} <br>
                        <span class="cart-totals-total">{{ presentPrice(Cart::total()) }}</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{route('shop.index')}}" class="button">Continue Shopping</a>
                <a href="{{route('checkout.index')}}" class="button-primary">Proceed to Checkout</a>
            </div>

            @else

                <h3>No items in Cart</h3>
                <div class="spacer"></div>
                    <a href="{{route('shop.index')}}" class="button">Continue Shopping</a>
                <div class="spacer"></div>
            @endif

            @if(Cart::instance('wishlist')->count() > 0) 

                <h2>{{ Cart::instance('wishlist')->count() }} item(s) in Wishlist</h2>

            <div class="saved-for-later cart-table">
                @foreach(Cart::instance('wishlist')->content() as $item)

                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{route('shop.show', $item->model->id)}}">
                            <img src="{{ productImage($item->model->img_default) }}" alt="item" class="cart-table-img">
                        </a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{route('shop.show', $item->model->id)}}">{{$item->model->name}}</a></div>
                            <div class="cart-table-description">{{$item->model->code}}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['wishlist.destroy', $item->rowId]]) }}
                                <button type="submit" class="cart-options">Remove</button>
                            {{ Form::close() }}
                            <br>
                            <!-- <a href="#"><i class="fa fa-star" style="font-size:24px;color:yellow"></i> Add to Wishlist</a> -->
                            {{ Form::open(['method' => 'POST', 'route' => ['wishlist.switchToCart', $item->rowId]]) }}
                                <button type="submit" class="cart-options">Moved to Cart</button>
                            {{ Form::close() }}
                        </div>
                        {{-- <div>
                            <select class="quantity">
                                <option selected="">1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div> --}}
                        <div>{{$item->model->presentPrice()}}</div>
                    </div>
                </div> <!-- end cart-table-row -->

                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>You have no items in the Wishlist</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.might-like')


@endsection

@section('extra-js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">(function(){
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function(){

                const id = element.getAttribute('data-id')

                axios.patch(`/cart/${id}`, {
                    quantity: this.value
                  })
                  .then(function (response) {
                    // console.log(response);
                    window.location.href = "{{ route('cart.index') }}"
                  })
                  .catch(function (error) {
                    // console.log(error);
                    window.location.href = "{{ route('cart.index') }}"
                  });
            })
        })
    })();</script>
@endsection

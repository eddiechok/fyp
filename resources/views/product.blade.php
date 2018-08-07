@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <a href="{{route('shop.index')}}">Shop</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{  $product->name }}</span>
    @endcomponent <!-- end breadcrumbs -->

    <div class="product-section container">
        <div class="product-section-image">
            <img src="{{  productImage($product->img_default) }}" width="360" height="230" alt="{{$product->name}}">
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{$product->name}}</h1>
            <div class="product-section-subtitle">{{$product->code}}</div>
            <div class="product-section-price">{{$product->presentPrice()}}</div>

            <p>
                {!! $product->description !!}
            </p>


            <!-- <a href="" class="button">Add to Cart</a> -->
            <form action='{{route('cart.store')}}' method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <button type="submit" class="button button-plain">Add to Cart</button>
        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')


@endsection

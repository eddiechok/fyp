<?php

use App\Common;
use App\Category;
?>
@extends('layout')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div class="spacer"></div>
<div class="container">
<!-- New Division Form -->
{!! Form::model($product, [
'route' => ['product.update', $product->id],
'class' => 'form-horizontal',
'method' => 'put',
'enctype' => "multipart/form-data"
]) !!}

<!-- Code -->
<div class="form-group row">
{!! Form::label('product-code', 'Code', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('code', $product->code, [
'id' => 'product-code',

'class' => 'form-control',
'maxlength' => 8,
]) !!}
</div>
</div>

<!-- Name -->
<div class="form-group row">
{!! Form::label('product-name', 'Name', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('name', $product->name, [
'id' => 'product-name',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<!-- Address -->
<div class="form-group row">
{!! Form::label('product-description', 'Description', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::textarea('description', $product->description, [
'id' => 'product-description',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- Postcode -->
<div class="form-group row">
{!! Form::label('product-price', 'Price', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('price', $product->price, [
'id' => 'product-price',
'class' => 'form-control',
'step' => 0.10,
]) !!}
</div>
</div>

<!-- City -->
<div class="form-group row">
{!! Form::label('product-quantity-on-hand', 'Quantity', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('quantity_on_hand', $product->quantity_on_hand, [
'id' => 'product-quantity-on-hand',
'class' => 'form-control',
'step' => 1,
]) !!}
</div>
</div>


<div class="form-group row">
{!! Form::label('product-img-default', 'Images', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
  <img src="{{  productImage($product->img_default) }}" width="300" height="170" alt="{{ $product->name }}">
  <div class="spacer"></div>
{!! Form::file('img_default', [
'id' => 'product-img-default',
'class' => 'form-control',
'name' => 'img_default',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-new-arrival', 'New Arrival', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::checkbox('new_arrival', 1, $product->new_arrival, [
'id' => 'product-new-arrival',
'class' => 'form-control',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-best-seller', 'Best Seller', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::checkbox('best_seller', 1, $product->best_seller, [
'id' => 'product-best-seller',
'class' => 'form-control',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-best-deal', 'Best Deal', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::checkbox('best_deal', 1, $product->best_deal, [
'id' => 'product-best-deal',
'class' => 'form-control',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-category-id', 'Category', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::select('category_id', Category::pluck('name', 'id'), $product->category_id, [
'id' => 'product-category-id',
'class' => 'form-control',
'placeholder' => '-Select Category-'
]) !!}
</div>
</div>
<!-- Submit Button -->
<div class="form-group row">
<div class="col-sm-offset-3 col-sm-6">
{!! Form::button('Update', [
'type' => 'submit',
'class' => 'btn btn-primary',
]) !!}
</div>
</div>
{!! Form::close() !!}
</div>
<div class="spacer"></div>
@endsection

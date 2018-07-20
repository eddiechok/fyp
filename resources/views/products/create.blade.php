<?php
use App\Category;
?>
@extends('layout')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="container">
	<div class="spacer"></div>
<!-- New Division Form -->
{!! Form::model($product, [
'route' => ['product.store'],
'class' => 'form-horizontal',
'enctype' => 'multipart/form-data',
]) !!}

<!-- Code -->
<div class="form-group row">
{!! Form::label('product-code', 'Code', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('code', null, [
'id' => 'product-code',
'class' => 'form-control',
'maxlength' => 8,
]) !!}
</div>
</div>

<!-- Name -->
<div class="form-group row">
{!! Form::label('division-name', 'Name', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('name', null, [
'id' => 'product-name',
'class' => 'form-control',
'maxlength' => 100,
]) !!}
</div>
</div>

<!-- Address -->
<div class="form-group row">
{!! Form::label('porduct-description', 'Description', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::textarea('description', null, [
'id' => 'product-description',
'class' => 'form-control',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-price', 'Price', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('price', null, [
'id' => 'product-price',
'class' => 'form-control',
'step' => 0.01,
'maxlength' => 10,
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-quantity-on-hand', 'Quantity', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('quantity_on_hand', null, [
'id' => 'product-quantity-on-hand',
'class' => 'form-control',
'maxlength' => 10,
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('product-img-default', 'Images', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
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
{!! Form::checkbox('new_arrival', 1, false, [
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
{!! Form::checkbox('best_seller', 1, false, [
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
{!! Form::checkbox('best_deal', 1, false, [
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
{!! Form::select('category_id', Category::pluck('name', 'id'), null, [
'id' => 'product-category-id',
'class' => 'form-control',
'placeholder' => '-Select Category-'
]) !!}
</div>
</div>

<!-- Submit Button -->
<div class="form-group row">
<div class="col-sm-offset-3 col-sm-6">
{!! Form::button('Save', [
'type' => 'submit',
'class' => 'btn btn-primary',
]) !!}
</div>
</div>
{!! Form::close() !!}
</div>
<div class="spacer"></div>

@endsection

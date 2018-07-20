<?php 
	use App\Common;
?>
@extends('layout')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="container">
	<div class="spacer"></div>
<!-- New Division Form -->
{!! Form::model($order, [
'route' => ['order.store'],
'class' => 'form-horizontal'
]) !!}

<div class="form-group row">
{!! Form::label('order-user-id', 'User ID', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('user_id', null, [
'id' => 'order-user-id',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- Name -->
<div class="form-group row">
{!! Form::label('order-billing-name', 'Name', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_name', null, [
'id' => 'order-billing-name',
'class' => 'form-control',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('order-billing-email', 'Email', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_email', null, [
'id' => 'order-billing-email',
'class' => 'form-control',
'type' => 'email',
]) !!}
</div>
</div>

<div class="form-group row">
{!! Form::label('order-billing-address', 'Address', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_address', null, [
'id' => 'order-billing-address',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- city -->
<div class="form-group row">
{!! Form::label('order-billing-city', 'City', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_city', null, [
'id' => 'order-billing-city',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- state -->
<div class="form-group row">
{!! Form::label('order-billing-state', 'State', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::select('billing_state', Common::$states, null, [
'id' => 'order-billing-state',
'class' => 'form-control',
'placeholder' => '- Select State - ',
]) !!}
</div>
</div>

<!-- postcode -->
<div class="form-group row">
{!! Form::label('order-billing-postcode', 'Postcode', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_postcode', null, [
'id' => 'order-billing-postcode',
'class' => 'form-control',
'maxlength' => 5,
]) !!}
</div>
</div>

<!-- phone -->
<div class="form-group row">
{!! Form::label('order-billing-phone', 'Phone', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_phone', null, [
'id' => 'order-billing-phone',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- name-on-card -->
<div class="form-group row">
{!! Form::label('order-billing-name-on-card', 'Name on Card', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_name_on_card', null, [
'id' => 'order-billing-name-on-card',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- discount -->
<div class="form-group row">
{!! Form::label('order-billing-discount', 'Discount', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('billing_discount', null, [
'id' => 'order-billing-discount',
'class' => 'form-control',
'step' => 0.01,
]) !!}
</div>
</div>

<!-- discount-code -->
<div class="form-group row">
{!! Form::label('order-billing-discount-code', 'Discount Code', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('billing_discount_code', null, [
'id' => 'order-billing-discount-code',
'class' => 'form-control',
]) !!}
</div>
</div>

<!-- subtotal -->
<div class="form-group row">
{!! Form::label('order-billing-subtotal', 'Subtotal', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('billing_subtotal', null, [
'id' => 'order-billing-subtotal',
'class' => 'form-control',
'step' => 0.01,
]) !!}
</div>
</div>

<!-- tax -->
<div class="form-group row">
{!! Form::label('order-billing-tax', 'Tax', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('billing_tax', null, [
'id' => 'order-billing-tax',
'class' => 'form-control',
'step' => 0.01,
]) !!}
</div>
</div>

<!-- total -->
<div class="form-group row">
{!! Form::label('order-billing-total', 'Total', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::number('billing_total', null, [
'id' => 'order-billing-total',
'class' => 'form-control',
'step' => 0.01,
]) !!}
</div>
</div>

<!-- error -->
<div class="form-group row">
{!! Form::label('order--error', 'Error', [
'class' => 'control-label col-sm-3',
]) !!}
<div class="col-sm-9">
{!! Form::text('error', null, [
'id' => 'order-error',
'class' => 'form-control',
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

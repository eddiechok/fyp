<?php

use App\Common;

?>
@extends('layout')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div class="spacer"></div>
<div class="container">
	<!-- New Division Form -->
	{!! Form::model($order, [
	'route' => ['order.update', $order->id],
	'class' => 'form-horizontal',
	'method' => 'put'
	]) !!}

	<div class="form-group row">
	{!! Form::label('order-user-id', 'User ID', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::text('user_id', $order->user_id, [
	'id' => 'order-user-id',
	'class' => 'form-control',
	'readonly' => ''
	]) !!}
	</div>
	</div>

	<!-- Name -->
	<div class="form-group row">
	{!! Form::label('order-billing-name', 'Name', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::text('billing_name', $order->billing_name, [
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
	{!! Form::text('billing_email', $order->billing_email, [
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
	{!! Form::text('billing_address', $order->billing_address, [
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
	{!! Form::text('billing_city', $order->billing_city, [
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
	{!! Form::select('billing_state', Common::$states, $order->billing_state, [
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
	{!! Form::text('billing_postcode', $order->billing_postcode, [
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
	{!! Form::text('billing_phone', $order->billing_phone, [
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
	{!! Form::text('billing_name_on_card', $order->billing_name_on_card, [
	'id' => 'order-billing-name-on-card',
	'class' => 'form-control',
	]) !!}
	</div>
	</div>

	<!-- discount -->
	<div class="form-group row">
	{!! Form::label('order-billing-discount', 'Discount (RM)', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::number('billing_discount', number_format($order->billing_discount, 2), [
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
	{!! Form::text('billing_discount_code', $order->billing_discount_code, [
	'id' => 'order-billing-discount-code',
	'class' => 'form-control',
	]) !!}
	</div>
	</div>

	<!-- subtotal -->
	<div class="form-group row">
	{!! Form::label('order-billing-subtotal', 'Subtotal (RM)', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::number('billing_subtotal', number_format($order->billing_subtotal, 2), [
	'id' => 'order-billing-subtotal',
	'class' => 'form-control',
	'step' => 0.01,
	]) !!}
	</div>
	</div>

	<!-- tax -->
	<div class="form-group row">
	{!! Form::label('order-billing-tax', 'Tax (RM)', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::number('billing_tax', number_format($order->billing_tax, 2), [
	'id' => 'order-billing-tax',
	'class' => 'form-control',
	'step' => 0.01,
	]) !!}
	</div>
	</div>

	<!-- total -->
	<div class="form-group row">
	{!! Form::label('order-billing-total', 'Total (RM)', [
	'class' => 'control-label col-sm-3',
	]) !!}
	<div class="col-sm-9">
	{!! Form::number('billing_total', number_format($order->billing_total, 2), [
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
	{!! Form::text('error', $order->billing_error, [
	'id' => 'order-error',
	'class' => 'form-control',
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

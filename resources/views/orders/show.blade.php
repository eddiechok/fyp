<?php

use App\Common;
use App\Product;

?>
@extends('layout')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="container">
	<div class="spacer"></div>
<table class="table table-striped table-bordered">
<!-- Table Headings -->
<thead>
<tr>
<th colspan="2" style="text-align: left">Details:</th>
</tr>
</thead>
<!-- Table Body -->
<tbody>

<tr>
<td>Order No</td>
<td>{{ $order->order_no }}</td>
</tr>
<tr>
<td>Products</td>
<td>
	@foreach($order->products as $product)
		<ul>
			<li>
				Product Code: {{ $product->code }}
			</li>
			<li>
				Product Name: {{ $product->name }}
			</li>
			<li>
				Product Price: {{ presentPrice($product->price) }}
			</li>
			<li>
				Product Quantity: {{ $product->pivot->quantity }}
			</li>
		</ul>
	@endforeach
</td>
</tr>
<tr>
<td>User Name</td>
<td>{{ $order->user->name }}</td>
</tr>
<tr>
<td>Billing Name</td>
<td>{{ $order->billing_name }}</td>
</tr>
<tr>
<td>Billing Email</td>
<td>{{ $order->billing_email }}</td>
</tr>
<tr>
<td>Billing Address</td>
<td>{{ $order->billing_address }}</td>
</tr>
<tr>
<td>Billing City</td>
<td>{{ $order->billing_city }}</td>
</tr>
<tr>
<td>Billing State</td>
<td>{{ $order->billing_state }}</td>
</tr>
<tr>
<td>Billing Postcode</td>
<td>{{ $order->billing_postcode }}</td>
</tr>
<tr>
<td>Billing Phone</td>
<td>{{ $order->billing_phone }}</td>
</tr>
<tr>
<td>Name on Card</td>
<td>{{ $order->billing_name_on_card }}</td>
</tr>
<tr>
<td>Billing Discount</td>
<td>{{ presentPrice($order->billing_discount) }}</td>
</tr>
<tr>
<td>Billing Discount Code</td>
<td>{{ $order->billing_discount_code }}</td>
</tr>
<tr>
<td>Billing Subtotal</td>
<td>{{ presentPrice($order->billing_subtotal) }}</td>
</tr>
<tr>
<td>Billing Tax</td>
<td>{{ presentPrice($order->billing_tax) }}</td>
</tr>
<tr>
<td>Billing Total</td>
<td>{{ presentPrice($order->billing_total) }}</td>
</tr>
<tr>
<td>Error</td>
<td>{{ $order->error }}</td>
</tr>
<tr>
<td>Created</td>
<td>{{ $order->created_at }}</td>
</tr>
</tbody>
</table>
</div>
<div class="spacer"></div>

@endsection

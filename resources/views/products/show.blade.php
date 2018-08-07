<?php

use App\Common;

?>
@extends('admin-layout')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="spacer"></div>
<div class="card">
	<div class="card-header bg-primary text-white">
		Product Info
	</div>
	<div class="card-body">
		<div style="text-align: center">
			<h2>{{  $product->name }}</h2>
			<br>
			<img src="{{ productImage($product->img_default) }}" width="360" alt="{{ $product->name }}">
		</div>
		<div class="spacer"></div>
		<table class="table table-striped table-bordered">
			<!-- Table Headings -->
			<thead>
				<tr>
					<th colspan="2" style="text-align: left">Details: </th>
				</tr>
			</thead>
			<!-- Table Body -->
			<tbody>

				<tr>
					<td>Code</td>
					<td>{{ $product->code }}</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>{{ $product->name }}</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>{!! nl2br($product->description) !!}</td>
				</tr>
				<tr>
					<td>Price</td>
					<td>{{ $product->price }}</td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td>{{ $product->quantity_on_hand }}</td>
				</tr>
				<tr>
					<td>Category</td>
					<td>{{ $product->category->name }}</td>
				</tr>
				<tr>
					<td>Tag</td>
					<td>
						@if($product->best_seller)
						Best Seller,
						@endif
						@if($product->new_arrival)
						New Arrival,
						@endif
						@if($product->best_deal)
						Best Deal
						@endif	
					</td>
				</tr>
				<tr>
					<td>Created</td>
					<td>{{ $product->created_at }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="spacer"></div>

@endsection

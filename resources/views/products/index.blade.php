 <?php

use App\Common;

?>
@extends('layout')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
	<div class="spacer"></div>
@if (count($products) > 0)
<table id="table" class="table table-striped task-table">

<!-- Table Headings -->
<thead>
<tr>
<th>No.</th>
<th>Code</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Quantity</th>
<th>Created At</th>
<th>Actions</th>
</tr>
</thead>

<!-- Table Body -->
<tbody>
@foreach ($products as $i => $product)
<tr>
<td class="table-text">
<div>{{ $i+1 }}</div>
</td>
<td class="table-text">
<div>
{!! link_to_route(
'product.show',
$title = $product->code,
$parameters = [
'id' => $product->id,
]
) !!}
</div>
</td>
<td class="table-text">
<div>{{ $product->name }}</div>
<div>
    <img src="{{  productImage($product->img_default) }}" width="240" alt="{{ $product->name }}">
</div>
</td>
<td class="table-text">
<div>{{ $product->description }}</div>
</td>
<td class="table-text">
<div>{{ $product->price }}</div>
</td>
<td class="table-text">
<div>{{ $product->quantity_on_hand }}</div>
</td>
<td class="table-text">
<div>{{ $product->created_at }}</div>
</td>
<td class="table-text">
<div>
{!! link_to_route(
'product.edit',
$title = 'Edit',
$parameters = [
'id' => $product->id,
]
) !!}
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
@else
<div>
No records found
</div>
@endif
</div>
<div class="spacer"></div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endsection

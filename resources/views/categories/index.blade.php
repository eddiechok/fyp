 <?php

use App\Common;

?>
@extends('admin-layout')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="spacer"></div>
<div class="card" >
	<div class="card-header bg-primary text-white">
		Category List
	</div>
	<div class="card-body">
@if (count($categories) > 0)
<table id="table" class="table table-striped table-bordered">

<!-- Table Headings -->
<thead>
<tr>
<th>No.</th>
<th>Name</th>
<th>Slug</th>
<th>Description</th>
<th>Created At</th>
<th>Actions</th>
</tr>
</thead>

<!-- Table Body -->
<tbody>
@foreach ($categories as $i => $category)
<tr>
<td class="table-text">
<div>{{ $i+1 }}</div>
</td>
<td class="table-text">
<div>
{!! link_to_route(
'category.show',
$title = $category->name,
$parameters = [
'id' => $category->id,
]
) !!}
</div>
</td>
<td class="table-text">
<div>{{ $category->slug }}</div>
</td>
<td class="table-text">
<div>{{ $category->description }}</div>
</td>
<td class="table-text">
<div>{{ $category->created_at }}</div>
</td>
<td class="table-text">
<div>
{!! link_to_route(
'category.edit',
$title = 'Edit',
$parameters = [
'id' => $category->id,
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
</div>

<div class="spacer"></div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endsection



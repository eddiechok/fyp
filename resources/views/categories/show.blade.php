<?php

use App\Common;

?>
@extends('admin-layout')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div class="spacer"></div>
<div class="card">
	<div class="card-header bg-primary text-white">
		Category Info
	</div>
	<div class="card-body">
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
<td>Name</td>
<td>{{ $category->name }}</td>
</tr>
<tr>
<td>Slug</td>
<td>{{ $category->slug }}</td>
</tr>
<tr>
<td>Description</td>
<td>{!! nl2br($category->description) !!}</td>
</tr>
<tr>
<td>Created</td>
<td>{{ $category->created_at }}</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="spacer"></div>

@endsection

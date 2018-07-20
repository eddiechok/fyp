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
		<!-- New Division Form -->
		{!! Form::model($category, [
		'route' => ['category.update', $category->id],
		'class' => 'form-horizontal',
		'method' => 'put'
		]) !!}

		<!-- Slug -->
		<div class="form-group row">
			{!! Form::label('category-slug', 'Slug', [
			'class' => 'control-label col-sm-3',
			]) !!}
			<div class="col-sm-9">
				{!! Form::text('slug', $category->slug, [
				'id' => 'category-slug',
				'class' => 'form-control'
				]) !!}
			</div>
		</div>

		<!-- Name -->
		<div class="form-group row">
			{!! Form::label('category-name', 'Name', [
			'class' => 'control-label col-sm-3',
			]) !!}
			<div class="col-sm-9">
				{!! Form::text('name', $category->name, [
				'id' => 'category-name',
				'class' => 'form-control',
				]) !!}
			</div>
		</div>

		<!-- Description -->
		<div class="form-group row">
			{!! Form::label('category-description', 'Description', [
			'class' => 'control-label col-sm-3',
			]) !!}
			<div class="col-sm-9">
				{!! Form::textarea('description', $category->description, [
				'id' => 'category-description',
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
</div>
<div class="spacer"></div>
@endsection

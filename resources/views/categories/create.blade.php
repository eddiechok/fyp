@extends('admin-layout')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div class="spacer"></div>
<div class="card">
	<div class="card-header bg-primary text-white">
		Create Category
	</div>
	<div class="card-body">
		<!-- New Division Form -->
		{!! Form::model($category, [
			'route' => ['category.store'],
			'class' => 'form-horizontal'
			]) !!}

			<!-- Code -->
			<div class="form-group row">
				{!! Form::label('category-slug', 'Slug', [
				'class' => 'control-label col-sm-3',
				]) !!}
				<div class="col-sm-9">
					{!! Form::text('slug', null, [
					'id' => 'category-slug',
					'class' => 'form-control',
					]) !!}
				</div>
			</div>

			<!-- Name -->
			<div class="form-group row">
				{!! Form::label('category-name', 'Name', [
				'class' => 'control-label col-sm-3',
				]) !!}
				<div class="col-sm-9">
					{!! Form::text('name', null, [
					'id' => 'category-name',
					'class' => 'form-control',
					]) !!}
				</div>
			</div>

			<!-- Address -->
			<div class="form-group row">
				{!! Form::label('category-description', 'Description', [
				'class' => 'control-label col-sm-3',
				]) !!}
				<div class="col-sm-9">
					{!! Form::textarea('description', null, [
					'id' => 'category-description',
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
	</div>
	<div class="spacer"></div>

	@endsection

@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">
				Categories
			</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
				</li>
				<li>
					<i class="fa fa-edit"></i> Categories
				</li>
				<li class="active">
					Edit Category
				</li>
			</ol>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			@if (!$errors->isEmpty())
				<div class="alert alert-danger">{{ HTML::ul($errors->all()) }}</div>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h3>Anda sedang mengedit kategori : {{$category->name}}</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
			{{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, array('class' => 'form-control')) }}
				<p class="help-block">Nama kategori yang ingin diinput.</p>
			</div>


			<div class="form-group">
				{{ Form::label('desc', 'Description:') }}
				{{ Form::textarea('desc', null, array('class' => 'form-control')) }}
				<p class="help-block">Deskripsi kategori yang ingin diinput.</p>	
			</div>
			
			<div class="form-group">
				{{ Form::submit('Save', array('class' => 'btn btn-info')) }}
			</div>

	{{ Form::close() }}	
</div>
</div>
</div>


	
@stop
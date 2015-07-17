@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">
				Authors
			</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
				</li>
				<li>
					<i class="fa fa-edit"></i> Authors
				</li>
				<li class="active">
					Edit Author
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
			<h3>Anda sedang mengedit penulis : {{$author->name}}</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
			{{ Form::model($author, array('route' => array('authors.update', $author->id), 'method' => 'PUT')) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, array('class' => 'form-control')) }}
				<p class="help-block">Nama penulis yang ingin diinput.</p>
			</div>
			
			<div class="form-group">
				{{ Form::label('contact', 'Kontak:') }}
				{{ Form::text('contact', null, array('class' => 'form-control')) }}
				<p class="help-block">Kontak seperti alamt email atau nomor handphone.</p>				
			</div>

			<div class="form-group">
				{{ Form::label('history', 'Riwayat hidup:') }}
				{{ Form::textarea('history', null, array('class' => 'form-control')) }}
				<p class="help-block">Deskripsi Riwayat hidup penulis -- improvement : make text-editor kaya tinymce</p>
			</div>

			
			<div class="form-group">
				{{ Form::submit('Save', array('class' => 'btn btn-info')) }}
			</div>

	{{ Form::close() }}	
</div>
</div>
</div>

@stop
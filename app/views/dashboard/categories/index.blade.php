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
				<li class="active">
					<i class="fa fa-edit"></i> Categories
				</li>
			</ol>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			@if (Session::has('message'))
    			<div class="alert alert-success">{{ Session::get('message') }}</div>
			@endif
			@if (!$errors->isEmpty())
				<div class="alert alert-danger">{{ HTML::ul($errors->all()) }}</div>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Categories Panel</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Nama Kategori</th>
									<th>Deskripsi</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $category)
									<tr>
										<td>{{$category->name}}</td>
										<td>{{$category->desc}}</td>	
										<td class="text-center"><a href="{{route('categories.edit',['categories'=>$category->id])}}" class="btn btn-primary btn-xs"  ><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td class="text-center">
											{{ Form::open(array('url' => 'categories/' . $category->id)) }}
												{{ Form::hidden('_method', 'DELETE') }}
												{{ Form::button('<span class="glyphicon glyphicon-trash">', array('class' => 'btn btn-danger btn-xs','type' => 'submit')) }}
											{{ Form::close() }}
										</td>
										<!-- <td class="text-center"><a href="{{route('categories.destroy',['categories'=>$category->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td> -->
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- <div class="text-right">
						<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
					</div> -->
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Form tambah kategori</div>
				<div class="panel-body">
					{{ Form::open(array('route' => 'categories.store', 'class'=>'form-horizontal' )) }}

				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', '', array('class' => 'form-control')) }}
				<p class="help-block">Nama kategori yang ingin diinput.</p>

				

				{{ Form::label('desc', 'Description:') }}
				{{ Form::textarea('desc', '', array('class' => 'form-control')) }}
				<p class="help-block">Deskripsi kategori yang ingin diinput.</p>
			

			
				{{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
				</div>
			</div>
			
			<!-- <button type="submit" class="btn btn-default">Submit Button</button>
			<button type="reset" class="btn btn-default">Reset Button</button> -->

			{{ Form::close() }}
		</div>
	</div>

</div>
@stop
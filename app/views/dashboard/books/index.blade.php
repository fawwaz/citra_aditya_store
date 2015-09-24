@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">
				books
			</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa fa-edit"></i> books
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
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> books Panel</h3>
				</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-md-3">
							<a href="{{route('books.create')}}" class="btn btn-block btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah buku</a>
							<!-- //<a href="" class="btn btn-info btx-lg"><i class="fa fa-plus"></i> Tambah Buku</a> <br/> -->
						</div>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Search!</button>
								</span>
							</div>
						</div>
					</div>
					<br>
					

					
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Judul Buku</th>
									<th>Penulis</th>
									<th>Kategori</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($books as $book)
								<tr>
									<td>{{$book->title}}</td>
									<td>
										<ul>
											@foreach($book->authors as $author)
											<li>{{$author->name}}</li>
											@endforeach
										</ul>
									</td>	
									<td>
										{{$book->category->name}}
									</td>
									<td class="text-center"><a href="{{route('books.show',['books'=>$book->id])}}" class="btn btn-success btn-xs"  ><span class="fa fa-eye"></span></a></td>
									<td class="text-center"><a href="{{route('books.edit',['books'=>$book->id])}}" class="btn btn-primary btn-xs"  ><span class="glyphicon glyphicon-pencil"></span></a></td>
									<td class="text-center">
										{{ Form::open(array('url' => 'books/' . $book->id)) }}
										{{ Form::hidden('_method', 'DELETE') }}
										{{ Form::button('<span class="glyphicon glyphicon-trash">', array('class' => 'btn btn-danger btn-xs','type' => 'submit')) }}
										{{ Form::close() }}
									</td>
									<!-- <td class="text-center"><a href="{{route('books.destroy',['books'=>$book->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td> -->
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{$books->links()}}
					<h3 style="color:red">JANGAN LUPA ADA PAGINATION</h3>
					<div class="text-right">
						<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
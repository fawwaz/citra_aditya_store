@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		@if (Session::has('message'))
		<div class="alert alert-success">{{ Session::get('message') }}</div>
		@endif
		<p style="color:red"><b>PERIKSA LAGI PAKE IF THEN ELSE KALAU SIZE ARRAY DARI AUTHORS KOSONG, katakan tidak ditemukan penulis tersebut: Make klausa @ if dan @ endif</b></p>
		Echo cart content
		<div class="table-responsive">
			{{ Form::open(array('route' => 'carts.update', 'class'=>'form-horizontal' , 'method'=>'PUT')) }}
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Judul Buku</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Subtotal</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($cart_contents as $cart)
					<tr>
						<td>{{$cart->name}} <b>Row id :</b></td>
						<td>{{$cart->price}}</td>
						<td>
							{{Form::text('quantity['.$cart->rowid.']',$cart->qty,array('class'=>'form-control'))}}
						</td>	
						<td>{{$cart->subtotal}}</td>
						<td class="text-center"><a href="{{route('books.show',['books'=>$cart->id])}}" class="btn btn-success btn-xs"  ><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td class="text-center"><a href="{{route('books.edit',['books'=>$cart->id])}}" class="btn btn-danger btn-xs"  ><span class="glyphicon glyphicon-minus"></span></a></td>						
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ Form::submit('Update !', array('class' => 'btn btn-lg btn-success btn-block')) }}

			{{Form::close()}}
		</div>

		<ul>
			@foreach($cart_contents as $cart)
			<li>
				<p>Nama barang {{$cart->name}}</p>
				<p>Kuantitas : {{$cart->qty}} </p>
				<p>Harga : {{$cart->price}}</p>
				<p>Subtotal : {{$cart->subtotal}}</p>
			</li>
			
			@endforeach
		</ul>
	</div>
</div>
@stop
@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<ul>
			<p style="color:red"><b>PERIKSA LAGI PAKE IF THEN ELSE KALAU SIZE ARRAY DARI AUTHORS KOSONG, katakan tidak ditemukan kategori tersebut: Make klausa @ if dan @ endif</b></p>
			<p style="color:orange">Exploring category XXX</p>
			@foreach($books as $b)
			<li>
				<p>{{$b->title}}</p>
				<p>{{$b->isbn}}</p>
				<p>{{$b->price}}</p>
				<p>{{$b->title}}</p>
				<p>
					{{ Form::open(array('route' => 'carts.store', 'class'=>'form-horizontal' )) }}
					{{ Form::hidden('id', $b->id)}}
					{{ Form::label('quantity', 'Jumlah:') }}
					{{ Form::text('quantity', '1', array('class' => 'form-control')) }}					
					{{ Form::button('<span class="glyphicon glyphicon-plus">', array('class' => 'btn btn-primary btn-xs','type' => 'submit')) }}
					{{ Form::close() }}
				</p>
			</li>
			@endforeach
		</ul>
	</div>
</div>
@stop
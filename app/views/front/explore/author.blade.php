@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<ul>
			<p style="color:red"><b>PERIKSA LAGI PAKE IF THEN ELSE KALAU SIZE ARRAY DARI AUTHORS KOSONG, katakan tidak ditemukan penulis tersebut: Make klausa @ if dan @ endif</b></p>
			Exploring books writen by : {{$authors->name}}
			@foreach($authors->books as $b)
			<li>
				<p>{{$b->title}}</p>
				<p>{{$b->isbn}}</p>
				<p>{{$b->price}}</p>
				<p>{{$b->title}}</p>
			</li>

			@endforeach
			
		</ul>
	</div>
</div>
@stop
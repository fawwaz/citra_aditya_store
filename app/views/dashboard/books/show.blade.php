@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="jumbotron">
				<b><h1 class="text-center">{{$book->title}}</h1></b>
				<h4 class="text-center">
					@foreach($book->authors as $author)
						{{$author->name}}</br>
					@endforeach
				</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{HTML::image('/uploads/books/'.$book->id.'.jpg',$book->title,array('class'=>'img-thumbnail text-center'))}}
			<p>{{$book->info}}</p>
		</div>
	</div>
</div>

@stop
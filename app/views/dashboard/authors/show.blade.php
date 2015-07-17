@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="jumbotron">
				<b><h1 class="text-center">{{$author->name}}</h1></b>
				<h4 class="text-center">
					{{$author->contact}}
				</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<p>{{$author->history}}</p>
		</div>
	</div>
</div>

@stop
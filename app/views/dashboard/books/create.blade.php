@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">


	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">
				Books
			</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa fa-edit"></i> Books
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
					Tambah Buku
				</div>
				<div class="panel-body">
					{{ Form::open(array('route' => 'books.store', 'class'=>'form-horizontal' , 'files'=>true)) }}
					
					
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('title', 'Judul:') }}
							{{ Form::text('title', '', array('class' => 'form-control')) }}
							<p class="help-block">Judul buku yang ingin diinput.</p>


							{{ Form::label('edition', 'Edisi:') }}
							{{ Form::text('edition', '', array('class' => 'form-control')) }}
							<p class="help-block">Edisi buku yang ingin diinput.</p>


							{{ Form::label('isbn', 'ISBN:') }}
							{{ Form::text('isbn', '', array('class' => 'form-control')) }}
							<p class="help-block">Nomor ISBN yang ingin diinput.</p>
							

							{{ Form::label('total_page', 'Jumlah Halaman:') }}
							{{ Form::text('total_page', '', array('class' => 'form-control')) }}
							<p class="help-block">Jumlah halaman buku yang ingin diinput. Patsikan hanya angka saja tanpa tulisan "hlm" dsb.</p>
							
							
							{{ Form::label('price', 'Harga:') }}
							{{ Form::text('price', '', array('class' => 'form-control')) }}
							<p class="help-block">Harga buku yang ingin diinput. Pastikan hanya angka tanpa tulisan "Rp."</p>

						</div>
						<div class="col-md-6">
							
							{{ Form::label('Image', 'Cover photo:') }}
							{{Form::file('image')}}
							<p class="help-block">Foto Cover buku yang ingin diinput.</p>
							
							{{ Form::label('category_id', 'Kategori:') }}
							<select name="category_id" class="form-control">
								@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
							<p class="help-block">Pilih kategori buku.</p>

							{{ Form::label('authors', 'Penulis Buku:') }}
							<select multiple="multiple" name="authors[]" id="authors">
								@foreach($authors as $author)
								<option value="{{$author->id}}">{{$author->name}}</option>
								@endforeach
							</select>		
							<p class="help-block">Klik nama penulis dari kolom sebelah kiri untuk memilih, jika ingin membatalkan klik dari kolom sebelah kanan.</p>

						</div>
					</div>

					

										

					<!-- <p style="color:red">input form select drop down populate daftar categori yang alvaialble apa aja</p>
					<p style="color:red"><b>KALAU LAGI NGEDIT HARUS DIPOPULATE MANUAL category mana saja yang idnya sama smaa diselect liat ini deh <a href="http://stackoverflow.com/questions/24627902/laravel-form-input-multiple-select-for-a-one-to-many-relationship">http://stackoverflow.com/questions/24627902/laravel-form-input-multiple-select-for-a-one-to-many-relationship</a></b></p>
					<p style="color:orange">Upload foto penulis convert jadi id foto simpan di public/photos/cover_book</p>-->
 
					
					{{ Form::label('info', 'Informasi tentang buku:') }}
					{{ Form::textarea('info', '', array('class' => 'form-control')) }}
					<p class="help-block">Deskripsi Riwayat hidup penulis -- improvement : make text-editor kaya tinymce</p>
					


					{{ Form::label('toc', 'Daftar isi buku:') }}
					{{ Form::textarea('toc', '', array('class' => 'form-control')) }}
					<p class="help-block">Deskripsi Riwayat hidup penulis -- improvement : make text-editor kaya tinymce</p>


					{{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

</div>

@stop

@section('customcss')
{{ HTML::style('bower_components/multi-select/css/multi-select.css') }}
@stop

@section('customjs')
{{ HTML::script('bower_components/multi-select/js/jquery.multi-select.js') }}
{{ HTML::script('bower_components/quicksearch/jquery.quicksearch.js') }}
<script>
$('#authors').multiSelect({
	selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Ketik nama penulis untuk mencari'><br>",
	selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Ketik nama penulis untuk mencari'><br>",
	afterInit: function(ms){
		var that 					= this,
		$selectableSearch 		= that.$selectableUl.prev(),
		$selectionSearch 		= that.$selectionUl.prev(),
		selectableSearchString 	= '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
		selectionSearchString 	= '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

		that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
		.on('keydown', function(e){
			if (e.which === 40){
				that.$selectableUl.focus();
				return false;
			}
		});

		that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
		.on('keydown', function(e){
			if (e.which == 40){
				that.$selectionUl.focus();
				return false;
			}
		});
	},
	afterSelect: function(){
		this.qs1.cache();
		this.qs2.cache();
	},
	afterDeselect: function(){
		this.qs1.cache();
		this.qs2.cache();
	}
});
</script>
@stop
<?php

class Book extends \Eloquent {
	protected $fillable = ['title','edition','isbn','total_page','price','info','toc','category_id'];

	public function authors(){
		return $this->belongsToMany('Author');
	}

	public function category(){
		return $this->belongsTo('Category');
	}
}
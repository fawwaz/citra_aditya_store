<?php

class Author extends \Eloquent {
	protected $fillable = ['name','history','contact'];

	public function books(){
		return $this->belongsToMany('Book');
	}
}
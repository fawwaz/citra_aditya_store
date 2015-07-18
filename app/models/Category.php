<?php

class Category extends \Eloquent {
	protected $fillable = ['name','desc'];

	public function books(){
		return $this->hasMany('Book');
	}
}
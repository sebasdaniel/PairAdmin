<?php

/**
* 
*/
class Pair extends Eloquent
{
	//protected $table = 'pairs';
	public function articles(){
		return $this->belongsToMany('Article')->withPivot('fecha_evaluacion');
	}
}
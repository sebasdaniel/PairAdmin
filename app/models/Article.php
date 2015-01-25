<?php

/**
* 
*/
class Article extends Eloquent
{
	public function pairs(){
		return $this->belongsToMany('Pair')->withPivot('fecha_evaluacion');
	}
}
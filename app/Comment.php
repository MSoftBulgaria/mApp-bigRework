<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'comments';
	
	protected $fillable = ['textOfComent','textOfComent','rating'];
	
	public function user() {
		return $this->hasOne('App/User');
	}
	
	public function video() {
		return $this->hasOne('App/Video');
	}
	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentrie extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'fileentries';
	
	protected $fillable = ['filename','mime','original_filename'];
	
	public function user() {
		return $this->hasOne('App/Video');
	}
}

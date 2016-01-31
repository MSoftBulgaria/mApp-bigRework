<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	protected $primaryKey = 'id';
	protected $table = 'videos';
	
	protected $fillable = ['name_in_filesystem','name_to_display','description','rating'];
	
	public function user() {
		return $this->hasOne('App/User');
	}
	
	public function  categorie() {
		return $this->hasOne('App/Categorie');
	}
	
	public function  thumbnail() {
		return $this->hasOne('App/Thumbnail');
	}
	
	public function comment() {
		return  $this->hasMany('App/Comment');
	}
	
	public function fileEntrie() {
		return  $this->hasMany('App/Fileentrie');
	}
	
	
	
	
	
}

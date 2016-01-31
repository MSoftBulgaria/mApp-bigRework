<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'categories';
	
	public $timestamps = false;	
	protected $fillable = ['categori_name'];
	
	
}

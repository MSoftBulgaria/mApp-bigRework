<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['thumbnamlsName'];
    
    public function video(){
    	return $this->hasOne('App/Video');
    }
}

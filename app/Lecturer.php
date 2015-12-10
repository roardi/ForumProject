<?php

namespace App;
use Eloquent;
//use Threadforum;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    //
	protected $table='dosen';
	protected $primaryKey='kdDosen';
	public function threadforum()
	{
		return $this->hasMany('App\Threadforum','kdAuthor');
	}
	public function comment()
	{
		return $this->hasMany('App\Comment','kdKomentator');
	}
}

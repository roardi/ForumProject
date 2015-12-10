<?php

namespace App;
use Eloquent;
//use Threadforum;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $table='mahasiswa';
	protected $primaryKey='nim';
	public function threadforum()
	{
		return $this->hasMany('App\Threadforum','kdAuthor');
	}
	public function comment()
	{
		return $this->hasMany('App\Comment','kdKomentator');
	}
}

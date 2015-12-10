<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Student;
//use Lecturer;
//use Comment;
use Eloquent;
class Comment extends Model
{
    //
	protected $table='komentarforum';
	protected $primaryKey='kdKomentar';
	public function threadforum()
	{
		return $this->belongsTo('App\Threadforum','kdThread')->select(array('kdThread','judul','isi'));
	}
	public function lecturer()
	{
		return $this->belongsTo('App\Lecturer','kdKomentator')->select(array('kdDosen','nama'));
	}
	public function student()
	{
		return $this->belongsTo('App\Student','kdKomentator')->select(array('nim','nama'));
	}
}

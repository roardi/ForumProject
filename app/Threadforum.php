<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Student;
//use Lecturer;
//use Comment;
use Eloquent;
class Threadforum extends Model
{
    //
	protected $table='threadforum';
	//protected $guarded=['kdThread'];
	protected $fillable=['kdAuthor','judul','isi','created_at','updated_at'];
	protected $primaryKey='kdThread';
	public function lecturer()
	{
		return $this->belongsTo('App\Lecturer','kdAuthor')->select(array('kdDosen','nama'));
	}
	public function student()
	{
		return $this->belongsTo('App\Student','kdAuthor')->select(array('nim','nama'));
	}
	
	public function comment()
	{
		return $this->hasMany('App\Comment','kdThread');
	}    
}

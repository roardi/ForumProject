<?php
use App\Student;
use App\Lecturer;
use App\Comment;
//use App\Threadforum;
?>
@extends('layout/template')
@section('content')
    <h1>Thread Show</h1>
	<?php 
	if ($thread->student==null){
		$author=$thread->lecturer->nama;
	}
	else
		$author=$thread->student->nama;
	?>
    <form class="form-horizontal">
        
        <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" placeholder={{$thread->judul}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="kdAuthor" class="col-sm-2 control-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder={{$author}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isi" class="col-sm-2 control-label">Detail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isi" placeholder={{$thread->isi}} readonly>
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('threadforum')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10" align="right">
				<a href="{{route('threadforum.comment.show',$thread->kdThread)}}" class="btn btn-warning">Comment</a>
			</div>
		</div>
		<?php 
			$komen=$thread->comment;
			foreach ($komen as $kom){
				if ($kom->student==null){
					$nama=$kom->lecturer->nama;
				}
				else
					$nama=$kom->student->nama;
				echo '<div class="form-group">
					<label for="isi" class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="isi" placeholder=';
					echo $kom->isi;
					echo '>
				</div>
        </div>';
		}
		?>
    </form>
@stop
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
	foreach($comment as $kom){
		if ($kom->threadforum->student==null){
			$author=$kom->threadforum->lecturer->nama;
		}
		else
			$author=$kom->threadforum->student->nama;
	}
	?>
    <form class="form-horizontal">
        
        <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" placeholder={{$kom->threadforum->judul}} readonly>
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
                <input type="text" class="form-control" id="isi" placeholder={{$kom->threadforum->isi}} readonly>
            </div>
        </div>
		<?php $kdThread=$kom->threadforum->kdThread;?>
		<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ route('threadforum.show',$kdThread)}}" class="btn btn-primary">Back</a>
            </div>
        </div>
		<?php $kdThread=$kom->threadforum->kdThread;?>
		{!! Form::open(['url' => 'threadforum/comment']) !!}
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10" align="right">
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			{!! Form::label('Comment', 'Comment:') !!}
			{!! Form::textarea('isi',null,['class'=>'form-control']) !!}
			</div>
		</div>
		<?php 
			
			foreach ($comment as $kom){
				/*if ($thread->student==null){
					$nama=$thread->lecturer->nama;
				}
				else
					$nama=$thread->student->nama;*/
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
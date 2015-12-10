<?php
use App\Student;
use App\Lecturer;
?>
@extends('layout.template')
@section('content')

    <h1>Update Thread</h1>
    {!! Form::model($threadforum,['method' => 'PATCH','route'=>['threadforum.update',$threadforum->kdThread]]) !!}
    <?php 
	$user=$threadforum->kdAuthor;
	$author=Lecturer::find($user);
	if ($author==null){
		$author=Student::find($user);
	}
	//echo $author['nama'];
	?>
	<div class="form-group">
        {!! Form::label('Author', 'Author:') !!}
        {!! Form::label($author["nama"],null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        {!! Form::label('Subject', 'Subject:') !!}
        {!! Form::text('judul',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('Detail', 'Detail:') !!}
        {!! Form::textarea('isi',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Update Thread', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
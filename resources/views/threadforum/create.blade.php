@extends('layout.template')
@section('content')

    <h1>Create New Thread</h1>
    {!! Form::open(['url' => 'threadforum']) !!}
    <div class="form-group">
        {!! Form::label('Author', 'Author:') !!}
        {!! Form::text('kdAuthor',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Create New Thread', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
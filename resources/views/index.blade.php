<?php
use App\Student;
?>
@extends('layout/template')

@section('content')
 <h1>Forum of Academic</h1>
 <a href="{{url('/threadforum/create')}}" class="btn btn-success">Create New Thread</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Subject</th>
         <th>Author</th>
         <th>Detail</th>
         <th>Date Created</th>
         <th>Last Modified</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($threadforum as $thread)
	 <?php 
		$user=$thread->kdAuthor;
		$author=Student::find($user);
		echo $author['nama'];
	?>
         <tr>
             <td>{{ $thread->judul }}</td>
             <td>{{ $author["nama"] }}</td>
             <td>{{ $thread->isi }}</td>
             <td>{{ $thread->created_at }}</td>
			 <td>{{ $thread->updated_at }}</td>
             <td><a href="{{url('threadforum',$thread->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('threadforum.edit',$thread->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['threadforum.destroy', $thread->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
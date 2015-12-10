<?php
use App\Student;
use App\Lecturer;
use App\Threadforum;
use App\Comment;
?>
@extends('layout/template')

@section('content')
 <h1>Forum of Academic</h1>
 <a  class="btn btn-success">Create New Thread</a>
 <form class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search" placeholder=Search>
            </div>
        </div>
	</form>
 <a href="{{url('/threadforum/create')}}" align="right" class="btn btn-success">Search</a>
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
	     <tr>
             <td>{{ $thread->judul }}</td>
             <td> <?php if ($thread->student==null){
							echo $thread->lecturer->nama;
						}
						else
							echo $thread->student->nama; ?> 
			 </td>
             <td>{{ $thread->isi }}</td>
             <td>{{ $thread->created_at }}</td>
			 <td>{{ $thread->updated_at }}</td>
             <td><a href="{{url('threadforum',$thread->kdThread)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('threadforum.edit',$thread->kdThread)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['threadforum.destroy', $thread->kdThread]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
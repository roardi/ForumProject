<?php

namespace App\Http\Controllers;
use DB;
use Request;
use App\Threadforum;
use App\Student;
use App\Lecturer;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ThreadForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     @return \Illuminate\Http\Response
     *///return \Illuminate\Http\Response
    public function index()
    {
        //
		$threadforum=Threadforum::with('student','lecturer')->get(array('kdThread','kdAuthor','judul','isi','created_at','updated_at'));
		//$threadforum=Threadforum::all();
        return view('threadforum.index',compact('threadforum'));
		//return $threadforum->toJson();
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('threadforum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$threadforum=Request::all();
		Threadforum::create($threadforum);
		return redirect('threadforum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kdThread)
    {
		//
		$thread=Threadforum::with('student','lecturer','comment.student','comment.lecturer')->find($kdThread);
		return view('threadforum.show',compact('thread'));
		//return $thread->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kdThread)
    {
        //
		$threadforum=Threadforum::find($kdThread);
		//return view('threadforum.edit',compact('threadforum'));
		return $threadforum->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kdThread)
    {
        //
		$threadUpdate=Request::all();
		$threadforum=Threadforum::find($kdThread);
		$threadforum->update($threadUpdate);
		//return redirect('threadforum');
		return $threadforum->toJson();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kdThread)
    {
        //
		Threadforum::find($kdThread)->delete();
		return redirect('threadforum');
    }
	
}

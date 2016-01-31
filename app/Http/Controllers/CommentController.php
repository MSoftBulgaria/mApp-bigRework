<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Comment;

class CommentController extends Controller
{
	public function __construct(){
		
		$this->middleware('jwt.auth', ['except' => ['index','show']]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	$category = Category::all();
        return response($category->toJson(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$rules = ['textOfComent' => 'required','user_id'=>'required','video_id'=>'required'];
    	
    	$isValid = Validator::make(Input::all(),$rules);
    	
    	if ($isValid->fails()) {
    		return response('Fail to store', 500);
    	}else {
    		$category = new Comment();
    		$category->textOfComent = $request->input('textOfComent');
    		$category->video_id = $request->input('video_id');
    		$category->user_id = $request->input('user_id');
    		$category->save();
    		return response('Sucsess', 200);
    	}
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commentsArray = \DB::table('comments')->where('video_id', '=', $id)->get();
    	 
        if ($commentsArray == null) {
        	return response('Not found',404);
        }else{
       		return response(json_encode($commentsArray),302);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrNew($id);
        
        if ($comment == null) {
        	return response('Not found edit',404);
        }else{
        	return response(json_encode($comment),302);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$rules = ['textOfComent' => 'required'];
    	
    	$isValid = Validator::make(Input::all(),$rules);
    	 
    	
    	$comment = Comment::findOrNew($id);
        
        if ($comment == null) {
        	return response('Not found',404);
        }else{
        	$comment->textOfComent = $request->input('textOfComent');
        	$comment->save();
        	return response(json_encode($comment),302);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$comment = Comment::find($id);
    	
        if ($comment == null) {
        	return response('Not found',404);
        }else {
        	$comment->delete();
        	return response('Deleted',201);
        }
    }
}

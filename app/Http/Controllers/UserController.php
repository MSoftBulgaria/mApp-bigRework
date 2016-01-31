<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function __construct()
	{
		// Apply the jwt.auth middleware to all methods in this controller
		// except for the store method. We don't want to prevent
		// the user from registration;
		//$this->middleware('jwt.auth', ['except' => ['store']]);
	}
	
    public function index()
    {
        $users = User::all();

        return $users;
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
   		$rules = ['name' => 'required|max:255',
   				  'email'=>'required|email|max:255|unique:users',
   				  'pass'=>'required|min:6'];
    	
    	$isValid = Validator::make(Input::all(),$rules);
    	
    	if ($isValid->fails()) {
    		return response('Fail to store', 455);
    	}else {
    		$user = new User();
    		$user->name = $request->input('name');
    		$user->email = $request->input('email');
    		$user->password = password_hash($request->input('pass'), PASSWORD_DEFAULT);
    		$user->save();
    		return response('User saved', 200);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getTopUsers(){
        $users = User::all();

        return $users;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Validator;
use Input;


class AuthenticateController extends Controller
{
	public function __construct(){
		
		$this->middleware('jwt.auth', ['except' => ['authenticate','store']]);
	}

	
	public function authenticate(Request $request){
	    
		$rules = ['name' => 'required|max:255',
				'email'=>'required|email|max:255',
				'pass'=>'required'];
		
		
		$isValid = Validator::make($request->all(),$rules);
		
		if ($isValid->fails()) {
			return response('Not valid login data', 500);
		}else {
			$user = \App\User::find(1)
			->where('email','=',$request->input('email'))
			->get();
			if (password_verify($request->input('pass'), $user[0]->returnPass())) {
				$customPayload = ['role' => $user[0]->role];
				$token = JWTAuth::fromUser($user[0],$customPayload);
				
				return response('{ "token" :'.'"'.$token.'"}', 200);
				
			}else {
				return response('Wrong pass',200);
			}
			
			
		}
		
		
		
		
		
		
		/* 
		$credentials = $request->only('email', 'password');
	
	        try {
	            // verify the credentials and create a token for the user
	            if (! $token = JWTAuth::attempt($credentials)) {
	                return response()->json(['error' => 'invalid_credentials'], 401);
	            }
	        } catch (JWTException $e) {
	            // something went wrong
	            return response()->json(['error' => 'could_not_create_token'], 500);
	        }
	
	        // if no errors are encountered we can return a JWT
	        return response()->json(compact('token')); */
	    }
	
	 public function store(Request $request)
	 {
	 	$rules = ['name' => 'required|max:255',
	 			'email'=>'required|email|max:255|unique:users',
	 			'pass'=>'required|min:6'];
	 	 
	 	$isValid = Validator::make(Input::all(),$rules);
	 	 
	 	if ($isValid->fails()) {
	 		return response('Fail to store', 500);
	 	}else {
	 		$user = new User();
	 		$user->name = $request->input('name');
	 		$user->email = $request->input('email');
	 		$user->password = bcrypt($request->input('pass'));
	 		$user->save();
	 		return response('User saved', 200);
	 	}
	 }
	 public function index()
	 {
	 	// Retrieve all the users in the database and return them
	 	$users = User::all();
	 	return $users;
	 }

}

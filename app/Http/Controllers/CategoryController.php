<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class CategoryController extends Controller
{
	public function __construct(){
		
		$this->middleware('jwt.auth', ['except' => ['index']]);
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
    	return 'not implemented';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$rules = ['name' => 'required'];
    	
    	$isValid = Validator::make(Input::all(),$rules);
    	
    	if ($isValid->fails()) {
    		return response('Fail to store', 500);
    	}else {
    		$category = new Category();
    		$category->category_name = $request->input('name');
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
        $category = Category::find($id);
         if ($category == null) {
         	return response('Not found',404);
         }
         return response($category->toJson(),302);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
         if ($category == null) {
         	return response('Not found',404);
         }else {

         	return response($category->toJson(),302);
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
    	$rules = ['name' => 'required'];
    	
    	$isValid = Validator::make(Input::all(),$rules);
    	
    	if ($isValid->fails()) {
    		return response('Fail to store', 500);
    	}else {
    		$category = Category::find($id);
    		$category->categori_name = $request->input('name');
    		$category->save();
    		return response('Updated', 200);
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
        $category = Category::find($id);
        if ($category == null) {
        	return response('Not found',404);
        }else {
        	$category->delete();
        	return response('Deleted',201);
        }
        
    }
}

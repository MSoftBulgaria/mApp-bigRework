<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Thumbnail;
use League\Flysystem\FilesystemInterface;
ini_set('max_execution_time', 300);
class ThumbnailController extends Controller
{
	/*public function __construct(){
	
		$this->middleware('jwt.auth', ['except' => ['show']]);
	}*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,FilesystemInterface $filesystem)
    {	
    	$timeOfrecord = time().'-';
    	$file = Request::file('filefield');
        //$file = $request->file('filefield');
        $stream = fopen($file->getRealPath(), 'r+');
    	$filesystem->writeStream('thumbnails/'.$timeOfrecord.$file->getClientOriginalName(), $stream);    
		
    	
		$thumbnail = new Thumbnail();
    	$thumbnail->thumbnamlsName = $timeOfrecord.$file->getClientOriginalName();
    	$thumbnail->save();
    	
    	return response('File saved',200);
    	
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,FilesystemInterface $filesystem)
    {
       	$thumbnail = Thumbnail::find($id);
       	
       	$photo = $filesystem->read('thumbnails/'.$thumbnail->thumbnamlsName);
       	
       	
       //	$file = Storage::disk()->get('thumbnails/'.$thumbnail->thumbnamlsName);
       	
       	$response = Response::make($photo);
       	$response->header('Content-Type', 'image/png');
       	return $response;
       	
       	
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
}

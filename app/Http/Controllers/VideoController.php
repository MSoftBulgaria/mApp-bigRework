<?php

namespace App\Http\Controllers;

use App\Category;
use Response;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Video;
use App\Thumbnail;
use League\Flysystem\FilesystemInterface;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return response($videos->toJson(),200);
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
        $file = Request::file('thumbnail-file');
        $thumbNailName = str_replace(' ', '_', $file->getClientOriginalName());
        $streamThumb = fopen($file->getRealPath(), 'r+');
        $filesystem->writeStream('thumbnails/'.$timeOfrecord.$thumbNailName, $streamThumb);


        $thumbnail = new Thumbnail();
        $thumbnail->thumbnamlsName = $timeOfrecord.$thumbNailName;
        $thumbnail->save();

        $thumbnailID = $thumbnail->id;


    	 

        $file = Request::file('video-file');
        $category = Request::input('category_id');
        $videoName = str_replace(' ', '_', $file->getClientOriginalName());
        $streamVideo = fopen($file->getRealPath(), 'r+');
        $filesystem->writeStream('video/'.$category.'/'.$timeOfrecord.$videoName, $streamVideo);


        $video = new Video();
        $video->name_to_display = Request::input('display-title');
        $video->name_in_filesystem = $timeOfrecord.$videoName;
        $video->description = Request::input('description');
        $video->user_id = Request::input('user_id');
        $video->categorie_id = Request::input('category_id');
        $video->thumbnail_id = $thumbnailID;
        $video->save();

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
        $videoData = Video::find($id);
       	
       	$videoElement = $filesystem->readStream('video/'.$videoData->categorie_id.'/'.$videoData->name);
       
       	$size = $filesystem->getSize('video/'.$videoData->categorie_id.'/'.$videoData->name);
       	
       	
       	
       return Response::stream(function () use ($videoElement) {
    	fpassthru($videoElement);
		}, 200, ["Content-type" => "video/mp4",
				"Content-Length" => $size]);
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

    public  function loadStartData(){

        $result = [];

        $highRatedVideos = \DB::table('videos')
            ->orderBy('rating','desc')
            ->take(5)
            ->get();
        shuffle($highRatedVideos);
        $result['RatedVideos'] =array_slice($highRatedVideos,0,4,true);

        $hotVideos = \DB::table('videos')
            ->orderBy('daily_views','desc')
            ->take(50)
            ->get();
        shuffle($hotVideos);
        $result['HotVideos'] =array_slice($hotVideos,0,4,true);


        $categories = Category::all();
        foreach ($categories as $category){
            $categoryData = \DB::table('videos')
                ->where('categorie_id', '=', $category->id)
                ->orderByRaw("RAND()")
                ->take(4)
                ->get();
            $result[$category->category_name] = $categoryData;
        }


        return response()->json($result);
    }
    public function loadMetadata($id){
        $video = Video::find($id);

        return response()->json($video);
    }







}

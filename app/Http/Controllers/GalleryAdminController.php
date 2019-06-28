<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Media;
use Illuminate\Http\Request;

class GalleryAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $galleries = Gallery::all();

        return view('galleries.index', compact('galleries'));

    }


    public function edit($id)
    {
        $galleries = Gallery::all();
        $gallery_to_update = Gallery::find($id);

        return view('galleries.index',compact('galleries', 'gallery_to_update','id'));
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'gallery_name' => 'required|min:3'
        ]);

        $obj = new Gallery();
        $obj->name= $request['gallery_name'];
        $obj->slug= str_replace(" ","-",strtolower($request['gallery_name']));
        $obj->created_by= \Auth::user()->id;
        $obj->active= ($request['gallery_active']==null)? 0:1;

        $obj->save();

        return back()->with('success', 'Gallery has been added');
    }

    public function show($id){

            $gallery = Gallery::findOrFail($id);

            return view('galleries.content', compact('gallery'));

    }

    public function doImageUpload(Request $request){
        //get request
        $file = $request->file('file');

        //set file name
        //$filename = uniqid(). $file->getClientOriginalName();
        $filename = 'snap-'.uniqid().'.'.strtolower($file->getClientOriginalExtension());

        //check for destination folder
        $folder_name = str_replace(' ', '', strtolower($request['gallery_name']));
        $server_path = storage_path('app/chapters').'/'. $folder_name;
        $path = 'img/chapters/'. $folder_name.'/';


        if(is_dir($server_path)){

        }else{
            mkdir($server_path);
        }

        //move file to correct location
        $file->move($server_path, $filename);

        //save info in database
        $gallery = Gallery::find($request->input('gallery_id'));

        $image = $gallery->media()->create([

            'gallery_id' => $request->input('gallery_id'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => $path,
            'created_by' => \Auth::user()->id
        ]);

        return $image;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type)
    {
        if($type == 'gallery'){

            $gallery = Gallery::find($id);
            $gallery->delete();
            return redirect('galleries')->with('success','Gallery has been deleted');

        }else{

            $media = Media::find($id);
            $media->delete();
            return redirect('galleries')->with('success','Image has been deleted');

        }

    }
}

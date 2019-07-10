<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Media;




class GalleryAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $galleries = Gallery::all();

        return view('galleries.index', compact('galleries'));

    }


    public function edit($id)
    {
        $galleries = Gallery::all();
        $gallery_to_update = Gallery::find($id);

        return view('galleries.index', compact('galleries', 'gallery_to_update', 'id'));
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'gallery_name' => 'required|min:3'
        ]);

        $obj = new Gallery();
        $obj->name = $request['gallery_name'];
        $obj->slug = str_replace(" ", "-", strtolower($request['gallery_name']));
        $obj->created_by = \Auth::user()->id;
        $obj->active = ($request['gallery_active'] == null) ? 0 : 1;

        $obj->save();

        return back()->with('success', 'Gallery has been added');
    }

    public function show($id)
    {

        $gallery = Gallery::findOrFail($id);

        return view('galleries.content', compact('gallery'));

    }

    public function doImageUpload(Request $request)
    {
        //get request
        $file = $request->file('file');

        //set file name
        //$filename = uniqid(). $file->getClientOriginalName();
        $filename = 'snap-' . uniqid() . '.' . strtolower($file->getClientOriginalExtension());

        //check for destination folder
        $folder_name = str_replace(' ', '', strtolower($request['gallery_name']));
        $server_path = storage_path('app/chapters') . '/' . $folder_name;
        $path = 'img/chapters/' . $folder_name . '/';


        if (! is_dir($server_path)) { mkdir($server_path); }

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
            //'file_order'=> $request->input('order'),
            'created_by' => \Auth::user()->id
        ]);

        $image->csrf = csrf_token();
        $image->action = url('/').'/'.$path.'/galleries';

        return $image;

    }


    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $this->validate(request(), [
            'gallery_name' => 'required|min:3'
        ]);

        $gallery->name = $request->get('gallery_name');
        $gallery->slug = str_replace(" ", "-", strtolower($request->get('gallery_name')));
        $gallery->active = ($request->get('gallery_active') == null) ? 0 : 1;
        $gallery->save();

        return back()->with('success', 'Gallery has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);

        $gallery = Gallery::find($media->gallery_id);

        //remove physical image
        $folder_name = str_replace(' ', '', strtolower($gallery->name));
        $server_path = storage_path('app/chapters') . '/' . $folder_name.'/';
        unlink($server_path.$media->file_name);

        //remove from DB
        $media->delete();

        return redirect('galleries/'.$media->gallery_id)->with('success', 'Image '.$id.' has been deleted');

    }

    public function destroyGallery($id){

        $gallery = Gallery::find($id);
        $name = $gallery->name;

        //remove folder and content
        $folder_name = str_replace(' ', '', strtolower($name));
        $server_path = storage_path('app/chapters') . '/' . $folder_name.'/';

        $this->removeDirRecursively($server_path);

        //remove content from DB
        $gallery->media()->where('gallery_id','=', $id)->delete();

        // remove gallery from DB
        $gallery->delete();

        return redirect('galleries')->with('success', 'Gallery '.$name.' has been deleted');
    }

    private function removeDirRecursively($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }
}


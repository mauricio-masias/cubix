<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Gallery;
use App\Media;
use App\Page;

class GalleryController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    public function index($chapter = 0)
    {
       
        $slug = ($chapter === 0)? 'chapter-1' : str_replace(" ", "-", strtolower($chapter));
        $folder = ($chapter === 0)? 'chapter1' : str_replace("-", "", $chapter);
        
        $pagex = Page::all()->toArray();
        $site = $pagex[0];
        $page = $pagex[3];

        $gallery = Gallery::all()->where('slug', '=', $slug)
                                 ->where('active', '=', 1);

        $gallery_id = (count($gallery) > 0)? $gallery[0]->id : 0;
                                 
        $media = Media::all()->where('gallery_id', '=', $gallery_id);

        return view('chapter_gallery',compact('site','page','folder','media'));
    }
}

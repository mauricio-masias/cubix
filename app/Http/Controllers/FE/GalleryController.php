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
        $slug = ($chapter == 0)? 'chapter-1' : str_replace(" ", "-", strtolower($chapter));

        $pagex = Page::all()->toArray();

        $gallery = Gallery::all()->where('slug', '=', $slug)
                                 ->where('active', '=', 1);

        $media = Media::all()->where('gallery_id', '=', $gallery[0]->id);

        $site = $pagex[0];
        $page = $pagex[3];


        $folder = ($chapter == 0)? 'chapter1' : str_replace("-", "", $chapter);


        return view('chapter_gallery',compact('site','page','folder','media'));
    }
}

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
        $chapter = $this->numberToRomanRepresentation(substr($slug, -1));
        
        $pagex = Page::all()->toArray();
        $site = $pagex[0];
        $page = $pagex[3];

        $gallery = Gallery::all()->where('slug', '=', $slug)
                                 ->where('active', '=', 1)
                                 ->first();

        $gallery_id = (is_object($gallery))? $gallery->id : 0;
                                 
        $media = Media::all()->where('gallery_id', '=', $gallery_id)->sortByDesc('file_order');

        return view('chapter_gallery',compact('site','page','folder','media','chapter'));
    }

    /**
     * @param int $number
     * @return string
     */
    private function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}

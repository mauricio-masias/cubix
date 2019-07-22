<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Box;
use App\Page;

class WelcomeController extends Controller
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



    public function index()
    {

    	//$projects = Project::all()->where('project_active', '=', 1)->sortByDesc('project_order')->toArray();
        //$categories = Category::all()->where('category_active', '=', 1)->sortByDesc('category_order')->toArray();
        //$boxes = Box::all()->where('box_active', '=', 1)->toArray();
        $boxes = Box::all()->toArray();
        //$jobs = Job::all()->where('job_active', '=', 1)->sortByDesc('job_order')->toArray();
        //$menus = Menu::all()->where('menu_active', '=', 1)->sortBy('menu_id')->toArray();
        $pagex = Page::all()->where('id', '=', 1)->toArray();
        $site = $pagex[0];

        return view('welcome',compact('boxes','site'));
    }
}

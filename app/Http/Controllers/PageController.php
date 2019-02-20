<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *  Display a listing of the resource.
    *
    *  @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pages = Page::all()->toArray();
        
        return view('pages.index', compact('pages'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {       		
	   
	   return view('pages.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $page = $this->validate(request(), [
          'title' => 'required',
          'subtitle' => 'required',
          'no_available' => 'required',
          'available' => 'required',
          'meta_description'=> 'required'
          
         
        ]);
        
        $user = new Page();
        $user->page_title= $request['title'];
        $user->page_subtitle= $request['subtitle'];
        $user->page_not_available= $request['no_available'];
        $user->page_available= $request['available'];
        $user->page_footer_year= $request['footer_year'];
        $user->page_footer_phone= $request['footer_phone'];
        $user->page_footer_email= $request['footer_email'];
        $user->page_meta_description= $request['meta_description'];
        $user->page_ga_code= $request['ga_code'];
        $user->page_og= $request['og'];
        $user->page_card= $request['card'];
        $user->page_extra_js= $request['extra_js'];
        $user->page_extra_js_footer= $request['extra_js_footer'];
        $user->page_active= ($request['active']==null)? 0:1;
        
        $user->page_pdf_name= $request['pdf_name'];

        if($request->hasFile('pdf')){
            $answer = $this->upload($request,$user->page_pdf_name);
            if($answer['status']){
                $user->page_pdf= $answer['path'].$answer['file_name'];
            }else{
                return back()->with('error','File could not be uploaded');
            }
        }
    	
    	$user->save();

        //Page::create($page);

        return back()->with('success', 'Page has been added');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
         $page = Page::find($id);
         return response()->download($page->page_pdf);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $page = Page::find($id);
       
        return view('pages.edit',compact('page','id'));
    }



    /**
    * Handle file upload
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  string  $custom_name
    * @return array
    */
    public function upload(Request $request, $custom_name="null")
    {
      
        $file = $request->file('pdf');
          
        if(!$file->isValid()) {
            $status = false; 
            return compact('status');
        }
        
        $status = true;  
        $path = storage_path() . '/app/public/';
        $file_name = ($custom_name != null)? $custom_name : $file->getClientOriginalName();
        $file->move($path, $file_name );
       
        return compact('path','file_name','status');
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
        $page = Page::find($id);
        $this->validate(request(), [
          'title' => 'required',
          'subtitle' => 'required',
          'no_available' => 'required',
          'available' => 'required',
          'meta_description'=> 'required'
          
        ]);

        $page->page_title= $request->get('title');
        $page->page_subtitle= $request->get('subtitle');
        $page->page_not_available= $request->get('no_available');
        $page->page_available= $request->get('available');
        $page->page_footer_year= $request->get('footer_year');
        $page->page_footer_phone= $request->get('footer_phone');
        $page->page_footer_email= $request->get('footer_email');
        $page->page_meta_description= $request->get('meta_description');
        $page->page_ga_code= $request->get('ga_code');
        $page->page_og= $request->get('og');
        $page->page_card= $request->get('card');
        $page->page_extra_js= $request->get('extra_js');
        $page->page_extra_js_footer= $request->get('extra_js_footer');
        $page->page_active= ($request->get('active')==null)? 0:1;
        $page->page_pdf_name= $request->get('pdf_name');

        if($request->hasFile('pdf')){
            $answer = $this->upload($request,$page->page_pdf_name);
            if($answer['status']){
                $page->page_pdf= $answer['path'].$answer['file_name'];
            }else{
                return redirect('pages')->with('error','File could not be uploaded');
            }
        }
       
        $page->save();
        return redirect('pages')->with('success','Page has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('pages')->with('success','Page has been deleted');
    }
}

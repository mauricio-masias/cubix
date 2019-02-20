<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use Image; 

class ProjectController extends Controller
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
        $projects = Project::all()->sortByDesc('project_order')->toArray();
        
        return view('projects.index', compact('projects'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {       		
	   $cat_drop = Category::all()->toArray();
	   return view('projects.create',compact('cat_drop'));
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $project = $this->validate(request(), [
          'name' => 'required',
          'url' => 'required',
          //'image' => 'required',
          'teaser' => 'required',
          'text' => 'required',
          'categories' => 'required',
          'order' => 'required|numeric'
        ]);
        
        $user = new Project();
        $user->project_name= $request['name'];
        $user->project_url= $request['url'];
        //$user->project_image= $request['image'];
        $user->project_teaser= $request['teaser'];
        $user->project_text= $request['text'];
        $user->project_categories= serialize($request['categories']);
        $user->project_order= $request['order'];
        $user->project_active= ($request['active']==null)? 0:1;

        if($request->hasFile('image')){
            $answer = $this->upload($request);
            if($answer['status']){
                $user->project_image= 'img/portfolio/'.$answer['file_name'];
            }else{
                return back()->with('error','File could not be uploaded');
            }
        }else{
           $user->project_image= 'img/portfolio/default.jpg';
        }
    	
    	$user->save();

        //Project::create($project);

        return back()->with('success', 'Project has been added');
    }




     /**
    * Handle file upload
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  string  $custom_name
    * @return array
    */
    public function upload(Request $request)
    {
      
        $file = $request->file('image');
          
        if(!$file->isValid()) {
            $status = false; 
            return compact('status');
        }
        
        $status = true;  
        $path = storage_path() . '/app/portfolio/';
        $file_name = $file->getClientOriginalName();

        $tmp = explode('.',$file_name);
        $file_name_retina = $tmp[0].'-2x.'.$file->getClientOriginalExtension();
        $file_name_normal = $tmp[0].'.'.$file->getClientOriginalExtension();

        //retina image
        //Image::make($request->file('image'))->resize(500,null)->crop(500, 279)->save($path.$file_name_retina);
        Image::make($request->file('image'))->fit(500,279,function($constraint){$constraint->upsize();})->save($path.$file_name_retina);

        //half size
        //Image::make($request->file('image'))->resize(250,null)->crop(250, 140)->save($path.$file_name_normal);
        Image::make($request->file('image'))->fit(250,140,function($constraint){$constraint->upsize();})->save($path.$file_name_normal);


        //$file->move($path, $file_name );
       
        return compact('path','file_name','status');
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $project = Project::find($id);
        $cat = unserialize($project->project_categories);
        if (!is_array($cat)){$categories[] = $cat;}else{$categories = $cat;}
        $cat_drop = Category::all()->toArray();
        return view('projects.edit',compact('project','id','categories','cat_drop'));
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
        $project = Project::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'url' => 'required',
          //'image' => 'required',
          'teaser' => 'required',
          'text' => 'required',
          'categories' => 'required',
          'order' => 'required|numeric'
        ]);

        $project->project_name= $request->get('name');
        $project->project_url= $request->get('url');
        //$project->project_image= $request->get('image');
        $project->project_teaser= $request->get('teaser');
        $project->project_text= $request->get('text');
        $project->project_categories= serialize($request->get('categories'));
        $project->project_order= $request->get('order');
        $project->project_active= ($request->get('active')==null)? 0:1;

        if($request->hasFile('image')){
            $answer = $this->upload($request);
            if($answer['status']){
                $project->project_image= 'img/portfolio/'.$answer['file_name'];
            }else{
                return redirect('projects')->with('error','File could not be uploaded');
            }
        }
        
        $project->save();
        return redirect('projects')->with('success','Project has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $project = Project::find($id);

    	//delete image asociated with project
            $img_to_delete = explode("/", $project->project_image);
    	$img_name = explode('.',end($img_to_delete));
    	
    	//normal image
    	unlink(storage_path('app/portfolio/'.$img_name[0].'.'.$img_name[1]));
    	//retina image
    	unlink(storage_path('app/portfolio/'.$img_name[0].'-2x.'.$img_name[1]));

    	//delete project
    	$project->delete();
        return redirect('projects')->with('success','Project has been deleted');
    }
}

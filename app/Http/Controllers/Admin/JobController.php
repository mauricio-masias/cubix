<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class JobController extends Controller
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
        $jobs = Job::all()->sortByDesc('job_order')->toArray();
        return view('jobs.index',compact('jobs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {                 
       return view('jobs.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $menu = $this->validate(request(), [
          'name' => 'required',
          'range' => 'required',
          'order' => 'required|numeric'
        ]);
        
        $user = new Job();
        $user->job_name = $request['name'];
        $user->job_url = ($request['url'] =='')? 'none':$request['url'];
        $user->job_range= $request['range'];
        $user->job_description= ($request['description']=='')? 'none':$request['description'];
        $user->job_title= ($request['title']=='')? 'none':$request['title'];
        $user->job_order= $request['order'];
        $user->job_active= ($request['active']==null)? 0:1;
        
        $user->save();

        return back()->with('success', 'Job has been added');
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
        $job = Job::find($id);
        return view('jobs.edit',compact('job','id'));
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
        $menu = Job::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'range' => 'required',
          'order' => 'required|numeric'
         
        ]);

        $menu->job_name= $request->get('name');
        $menu->job_url= ($request->get('url') =='')? 'none':$request->get('url');
        $menu->job_range= $request->get('range');
        $menu->job_description= ($request->get('description') =='')? 'none':$request->get('description');
        $menu->job_title= ($request->get('title') =='')? 'none':$request->get('title');
        $menu->job_order= $request->get('order');
        $menu->job_active= ($request->get('active')==null)? 0:1;
       
        $menu->save();
        return redirect('jobs')->with('success','Job has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $menu = Job::find($id);
        $menu->delete();
        return redirect('jobs')->with('success','Job has been deleted');
    }
}

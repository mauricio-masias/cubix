<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Box;

class BoxController extends Controller
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
        $boxes = Box::all()->toArray();
        return view('boxes.index', compact('boxes'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {               
       return view('boxes.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $box = $this->validate(request(), [
          'name' => 'required',
          'content' => 'required' 
        ]);
        
        $user = new Box();
        $user->box_name= $request['name'];
        $user->box_content= $request['content'];
        $user->box_active= ($request['active']==null)? 0:1;
        
        $user->save();

        //Box::create($box);

        return back()->with('success', 'Box has been added');
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
        $box = Box::find($id);
        return view('boxes.edit',compact('box','id'));
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
        $box = Box::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'content' => 'required'
         
        ]);

        $box->box_name= $request->get('name');
        $box->box_content= $request->get('content');
        $box->box_active= ($request->get('active')==null)? 0:1;
       
        $box->save();
        return redirect('boxes')->with('success','Box has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $box = Box::find($id);
        $box->delete();
        return redirect('boxes')->with('success','Box has been deleted');
    }
}

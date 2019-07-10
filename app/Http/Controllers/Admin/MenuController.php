<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
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
        $menus = Menu::all()->sortBy('menu_id')->toArray();
        return view('menus.index',compact('menus'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {               
       $menu_drop = Menu::all()->toArray();
       return view('menus.create',compact('menu_drop'));
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
          'label' => 'required',
          'slug' => 'required',
          'link' => 'required',
          'order' => 'required|numeric',
        ]);
        
        $user = new Menu();
        $user->menu_text = $request['label'];
        $user->menu_slug = $request['slug'];
        $user->menu_type = $request['type'];
        $user->menu_parent= $request['parent'];
        $user->menu_link= $request['link'];
        $user->menu_outbound= ($request['outbound']==null)? 0:1;
        $user->menu_order= $request['order'];
        $user->menu_active= ($request['active']==null)? 0:1;
        
        $user->save();

        return back()->with('success', 'Menu has been added');
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
        $menu = Menu::find($id);
        $menu_drop = Menu::all()->toArray();
        return view('menus.edit',compact('menu','id','menu_drop'));
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
        $menu = Menu::find($id);
        $this->validate(request(), [
          'label' => 'required',
          'slug' => 'required',
          'link' => 'required',
          'order' => 'required|numeric',
         
        ]);

        $menu->menu_text= $request->get('label');
        $menu->menu_slug= $request->get('slug');
        $menu->menu_type= $request->get('type');
        $menu->menu_parent= $request->get('parent');
        $menu->menu_link= $request->get('link');
        $menu->menu_outbound= ($request->get('outbound')==null)? 0:1;
        $menu->menu_order= $request->get('order');
        $menu->menu_active= ($request->get('active')==null)? 0:1;
       
        $menu->save();
        return redirect('menus')->with('success','Menu has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('menus')->with('success','Menu has been deleted');
    }
}

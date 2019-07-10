<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;


class CategoryController extends Controller
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
        $categories = Category::all()->sortByDesc('category_order')->toArray();
        return view('categories.index', compact('categories'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {               
       return view('categories.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $category = $this->validate(request(), [
          'name' => 'required',
          'slug' => 'required',
          'order' => 'required|numeric',
          
        ]);
        
        $user = new Category();
        $user->category_name= $request['name'];
        $user->category_slug= $request['slug'];
        $user->category_order= $request['order'];
        $user->category_active= ($request['active']==null)? 0:1;
        
        $user->save();

        //Category::create($category);

        return back()->with('success', 'Category has been added');
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
        $category = Category::find($id);
        return view('categories.edit',compact('category','id'));
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
        $category = Category::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'slug' => 'required',
          'order' => 'required|numeric',
         
        ]);

        $category->category_name= $request->get('name');
        $category->category_slug= $request->get('slug');
        $category->category_order= $request->get('order');
        $category->category_active= ($request->get('active')==null)? 0:1;
       
        $category->save();
        return redirect('categories')->with('success','Category has been updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('categories')->with('success','Category has been deleted');
    }
}

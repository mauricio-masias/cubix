@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Edit Menu | <a href="{{ url('/menus') }}"> &lt; Back</a></h2>
      <hr>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      <form method="post" action="{{action('Admin\MenuController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Label:</label>
            <input type="text" class="form-control" name="label" value="{{$menu->menu_text}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{{$menu->menu_slug}}">
          </div>
        </div>
        
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Type:</label>
               
               <select name="type" >
                <option value="parent" @if ($menu->menu_type == 'parent') selected="selected" @endif>Parent</option>
                <option value="child" @if ($menu->menu_type == 'child') selected="selected" @endif>Child</option>
               </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Link:</label>
              <input type="text" class="form-control" name="link" value="{{$menu->menu_link}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Parent:</label>
              <select name="parent" >
                <option value="0">None</option>
              @foreach ($menu_drop as $item)
                <option value="{{$item['menu_id']}}" @if ($item['menu_id'] == $menu->menu_parent) selected="selected" @endif>{{$item['menu_text']}}</option> 
              @endforeach
             </select>

          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Outbound:</label>
               <input type="checkbox" name="outbound" value="1" @if ($menu->menu_outbound == 1) checked @endif> 
             
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Order:</label>
              <input type="text" class="form-control" name="order" value="{{$menu->menu_order}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" name="active" value="1" @if($menu->menu_active == 1) checked @endif> 
          </div>
        </div>

        
        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Menu</button>
          </div>
        </div>
      
      </form>
    </div>
@endsection

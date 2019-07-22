@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Edit Box | <a href="{{ url('/boxes') }}"> &lt; Back</a></h2>
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
      <form method="post" action="{{action('Admin\BoxController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$box->box_name}}">
          </div>
        </div>
        
      

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Content:</label>
              <textarea name="content" rows="15" cols="100">{{$box->box_content}}</textarea>
          </div>
        </div>



        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Active:</label>
              <input type="checkbox" name="active" value="1" @if ($box->box_active == 1) checked="checked" @endif>
          </div>
        </div>

        
        
        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Box</button>
          </div>
        </div>
      
      </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Create Category | <a href="{{ url('/categories') }}"> &lt; Back</a></h2><br />
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

      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif

      <form method="post" action="{{url('categories')}}">
         {{csrf_field()}}

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{!! old('name') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{!! old('slug') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Order:</label>
            <input type="text" class="form-control" name="order" value="{!! old('order') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" value="1" name="active" @if(old('active') == 1) checked @endif>
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Add Category</button>
          </div>
        </div>

      </form>

    </div>
@endsection

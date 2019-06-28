<!-- create.blade.php -->

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Create Job</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>

  <body>

    @include('nav')

    <div class="container">
      <h2>Create Job | <a href="{{ url('/jobs') }}"> &lt; Back</a></h2><br />
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

      <form method="post" action="{{url('jobs')}}">
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
              <label for="price">Url:</label>
              <input type="text" class="form-control" name="url" value="{!! old('url') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Range:</label>
              <input type="text" class="form-control" name="range" value="{!! old('range') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Description:</label>
              <input type="text" class="form-control" name="description" value="{!! old('description') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Job title:</label>
              <input type="text" class="form-control" name="title" value="{!! old('title') !!}">
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
            <button type="submit" class="btn btn-success">Add Job</button>
          </div>
        </div>

      </form>

    </div>

  </body>
</html>

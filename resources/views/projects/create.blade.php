<!-- create.blade.php -->

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Projects</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>

  <body>

    @include('nav')

    <div class="container">
      <h2>Create Project | <a href="{{ url('/projects') }}"> &lt; Back</a></h2><br />
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

      <form method="post" action="{{url('projects')}}" enctype="multipart/form-data">
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
            <label for="price">Image:</label>
            <p><strong>Sizes</strong> : 2x[500 × 279] 1x[250 × 140]</p>
            <input type="file" name="image">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">URL:</label>
            <input type="text" class="form-control" name="url" value="{!! old('url') !!}">
          </div>
        </div>
        

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">Teaser:</label>
              <input type="text" class="form-control" name="teaser" value="{!! old('teaser') !!}">
            </div>
        </div>
        

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">Text:</label>
              <textarea class="form-control" name="text" rows="8">{!! old('text') !!}</textarea>
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
              <label for="price">Categories:</label>
              <select multiple='multiple' name="categories[]" style="height:150px;width:100px">
                @foreach ($cat_drop as $cats)
                  <option value="{{$cats['category_slug']}}">{{$cats['category_name']}}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">Active:</label>
              <input type="checkbox" value="1" name="active" checked="checked">
            </div>
        </div>
      

        <hr>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Add Project</button>
          </div>
        </div>

      </form>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

<!-- edit.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Edit Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    @include('nav')

    <div class="container">
      <h2>Edit Category | <a href="{{ url('/categories') }}"> &lt; Back</a></h2>
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
      <form method="post" action="{{action('CategoryController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$category->category_name}}">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{{$category->category_slug}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Order:</label>
            <input type="text" class="form-control" name="order" value="{{$category->category_order}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            @if ($category->category_active === 1)
              <input type="checkbox" name="active" value="1" checked="checked">
            @else
               <input type="checkbox" name="active" value="1">
            @endif
          </div>
        </div>

        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Category</button>
          </div>
        </div>
      
      </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

<!-- create.blade.php -->

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Create Menu</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>

  <body>

    @include('nav')

    <div class="container">
      <h2>Create Menu | <a href="{{ url('/menus') }}"> &lt; Back</a></h2><br />
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

      <form method="post" action="{{url('menus')}}">
         {{csrf_field()}}


       <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Label:</label>
            <input type="text" class="form-control" name="label" value="{!! old('label') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{!! old('slug') !!}">
          </div>
        </div>
        
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Type:</label>
               <select name="type" >
                <option value="parent" @if (old('type') == 'parent') selected="selected" @endif>Parent</option>
                <option value="child" @if (old('type') == 'child') selected="selected" @endif>Child</option>
               </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Link:</label>
              <input type="text" class="form-control" name="link" value="{!! old('link') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Parent:</label>
               <select name="parent" >
                <option value="0">None</option>
              @foreach ($menu_drop as $item)
                <option value="{{$item['menu_id']}}" @if($item['menu_id'] == old('parent')) selected="selected" @endif>{{$item['menu_text']}}</option> 
              @endforeach
             </select>
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Outbound:</label>
              <input type="checkbox" name="outbound" value="1" @if(old('parent') == 1) checked @endif> 
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
            <button type="submit" class="btn btn-success">Add Menu</button>
          </div>
        </div>

      </form>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

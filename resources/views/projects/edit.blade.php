<!-- edit.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Projects Edit</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    @include('nav')

    <div class="container">
      <h2>Edit Project | <a href="{{ url('/projects') }}"> &lt; Back</a></h2>
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
      <form method="post" action="{{action('ProjectController@update', $id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$project->project_name}}">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Image:</label> <p><strong>Sizes</strong> : 2x[500 × 279] 1x[250 × 140]<br /><strong>Actual</strong> : {{$project->project_image}}</p>
            <input type="file" name="image">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">URL:</label>
              <input type="text" class="form-control" name="url" value="{{$project->project_url}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Teaser:</label>
              <input type="text" class="form-control" name="teaser" value="{{$project->project_teaser}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Text:</label>
              <textarea class="form-control" name="text" rows="8">{{$project->project_text}}</textarea>
              
          </div> 
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Order:</label>
              <input type="text" class="form-control" name="order" value="{{$project->project_order}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Categories:</label>
               
               <select multiple="multiple" name="categories[]" style="height:150px;width:100px">
                
                @foreach ($cat_drop as $cats)
                  
                  @if (in_array($cats['category_slug'], $categories))
                    <option value="{{$cats['category_slug']}}" selected="selected">{{$cats['category_name']}}</option>
                  @else
                    <option value="{{$cats['category_slug']}}">{{$cats['category_name']}}</option>
                  @endif
                  
                @endforeach

              </select>
             
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" name="active" value="1" @if($project->project_active == 1) checked @endif> 
          </div>
        </div>
        
        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Project</button>
          </div>
        </div>
      
      </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

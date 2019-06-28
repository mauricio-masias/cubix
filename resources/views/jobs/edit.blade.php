<!-- edit.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Edit Job</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>
  <body>

    @include('nav')

    <div class="container">
      <h2>Edit Job | <a href="{{ url('/jobs') }}"> &lt; Back</a></h2>
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
      <form method="post" action="{{action('JobController@update', $id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$job->job_name}}">
          </div>
        </div>
        
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Url: (# to hide Description and title on FE)</label>
              <input type="text" class="form-control" name="url" value="{{$job->job_url}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Range:</label>
              <input type="text" class="form-control" name="range" value="{{$job->job_range}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Description:</label>
              <input type="text" class="form-control" name="description" value="{{$job->job_description}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$job->job_title}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Order:</label>
              <input type="text" class="form-control" name="order" value="{{$job->job_order}}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" name="active" value="1" @if ($job->job_active == 1) checked @endif> 
          </div>
        </div>

        
        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Job</button>
          </div>
        </div>
      
      </form>
    </div>

  </body>
</html>

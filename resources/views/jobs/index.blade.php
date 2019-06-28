<!-- galleryMaster.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Jobs</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Jobs | <a href="{{ url('/jobs/create') }}"> &nbsp;+&nbsp;</a></h2>
      <hr>

      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      
      <table class="table table-striped">
        
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Url</th>
            <th>Range</th>
            <th>Description</th>
            <th>Job title</th>
            <th>Order</th>
            <th>Active</th>
            <th colspan="2" width="15%">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($jobs as $job)
          <tr>
            <td>{{$job['job_id']}}</td>
            <td>{{$job['job_name']}}</td>
            <td>{{$job['job_url']}}</td>
            <td>{{$job['job_range']}}</td>
            <td>{{$job['job_description']}}</td>
            <td>{{$job['job_title']}}</td>
            <td>{{$job['job_order']}}</td>
            <td>{{$job['job_active']}}</td>

            <td><a href="{{action('JobController@edit', $job['job_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('JobController@destroy', $job['job_id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    </div>

  </body>
</html>


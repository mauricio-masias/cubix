<!-- galleryMaster.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Boxes</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Boxes | <a href="{{ url('/boxes/create') }}"> &nbsp;+&nbsp;</a></h2>
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
            <th>Content</th>
            <th>Active</th>
            <th colspan="2" width="15%">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($boxes as $box)
          <tr>
            <td>{{$box['box_id']}}</td>
            <td>{{$box['box_name']}}</td>
            <td>{{strlen($box['box_content'])}} Chars</td>
            <td>{{$box['box_active']}}</td>

            <td><a href="{{action('BoxController@edit', $box['box_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('BoxController@destroy', $box['box_id'])}}" method="post">
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


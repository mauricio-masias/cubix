<!-- galleryMaster.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Categories</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Categories | <a href="{{ url('/categories/create') }}">&nbsp;+&nbsp;</a></h2>
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
            <th>Slug</th>
            <th>Order</th>
            <th>Active</th>
            <th colspan="2" width="15%">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{$category['category_id']}}</td>
            <td>{{$category['category_name']}}</td>
  
            <td>{{$category['category_slug']}}</td>
            <td>{{$category['category_order']}}</td>
            <td>{{$category['category_active']}}</td>
            

            <td><a href="{{action('CategoryController@edit', $category['category_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('CategoryController@destroy', $category['category_id'])}}" method="post">
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


<!-- galleryMaster.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Menus</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Menus | <a href="{{ url('/menus/create') }}"> &nbsp;+&nbsp;</a></h2>
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
            <th>Label</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Link</th>
            <th>Parent</th>
            <th>Outbound</th>
            <th>Order</th>
            <th>Active</th>
            <th colspan="2" width="15%">Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($menus as $menu)
          <tr>
            <td>{{$menu['menu_id']}}</td>
            <td>{{$menu['menu_text']}}</td>
            <td>{{$menu['menu_slug']}}</td>
            <td>{{$menu['menu_type']}}</td>
            <td>{{$menu['menu_link']}}</td>
            <td>{{$menu['menu_parent']}}</td>
            <td>{{$menu['menu_outbound']}}</td>
            <td>{{$menu['menu_order']}}</td>
            <td>{{$menu['menu_active']}}</td>

            <td><a href="{{action('MenuController@edit', $menu['menu_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('MenuController@destroy', $menu['menu_id'])}}" method="post">
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


<!-- galleryMaster.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Pages</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Pages | <a href="{{ url('/pages/create') }}"> &nbsp;+&nbsp;</a></h2>
      <hr>

      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      
      @foreach($pages as $page)
      <table class="table table-striped">
        <tbody>
          
          <tr>
            <th width="20%">ID</th>
            <td>{{$page['id']}}</td>
          </tr>
          <tr>
            <th>Title</th>
            <td>{{$page['page_title']}}</td>
          </tr>
          <tr>
            <th>Subtitle</th>
            <td>{{$page['page_subtitle']}}</td>
          </tr>
          <tr>  
            <th>Project no&nbsp;available</th>
            <td>{{$page['page_not_available']}}</td>
          </tr>
          <tr>
            <th>Project available</th>
            <td>{{$page['page_available']}}</td>
          </tr>
          <tr>
            <th>Footer year</th>
            <td>@if($page['page_footer_year']!= null) {{$page['page_footer_year']}} @else No @endif </td>
          </tr>
          <tr>
            <th>Footer phone</th>
            <td>@if($page['page_footer_phone']!= null) {{$page['page_footer_phone']}} @else No @endif</td>
          </tr>
          <tr>
            <th>Footer email</th>
            <td>@if($page['page_footer_email']!= null) {{$page['page_footer_email']}} @else No @endif</td>
          </tr>
          <tr>
            <th>PDF Label</th>
            <td>{{$page['page_pdf_name']}}</td>
          </tr>
          <tr>
            <th>PDF</th>
            <td>{{$page['page_pdf']}}</td>
          </tr>
          <tr>
            <th>GA tracking code</th>
            <td>{{$page['page_ga_code']}}</td>
          </tr>
           <tr>
            <th>Meta description</th>
            <td>{{$page['page_meta_description']}}</td>
          </tr>
          <tr>
            <th>Meta OG</th>
            <td>@if($page['page_og']!= null) Yes @else No @endif</td>
          </tr>
          <tr>
            <th>Meta Cards</th>
            <td>@if($page['page_card']!= null) Yes @else No @endif</td>
          </tr>
          <tr>
            <th>Extra JS header</th>
            <td>@if($page['page_extra_js']!= null) Yes @else No @endif</td>
          </tr>
          <tr>
            <th>Extra JS footer</th>
            <td>@if($page['page_extra_js_footer']!= null) Yes @else No @endif</td>
          </tr>
          <tr>
            <th>Active</th>
            <td>{{$page['page_active']}}</td>
          </tr>
          <tr>
            <th>Action</th>
            <td><a href="{{action('PageController@edit', $page['id'])}}" class="btn btn-warning">Edit</a> 
              <form action="{{action('PageController@destroy', $page['id'])}}" method="post" style="display: inline-block;">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr> 
        </tbody>
      </table>
      @endforeach
    </div>

  </body>
</html>


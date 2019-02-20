<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Projects</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

     <style>
      #sortable {  margin: 0; padding: 0;  }
      .ui-state-highlight { height: 150px; line-height: 1.2em; background:#0d0!important; margin: 0 5px 5px 5px; padding: 5px;}
      </style>
    <script>
      $( function() {
        $( "#sortable" ).sortable({
          placeholder: "ui-state-highlight",
          update: function( event, ui ){
            var order_ids=[];
            $('#sortable tr').each(function(){order_ids.push($(this).attr('rel'));})
            getMessage(order_ids);
          }
        });
        $( "#sortable" ).disableSelection();
      });

      function getMessage(order_ids){
            var order_ids_ready = encodeURIComponent(JSON.stringify(order_ids));
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:{_token : "<?php echo csrf_token() ?>",ids:order_ids_ready},
               success:function(data){
                  if(data.status!='ok'){$("#msg").html(data.error);}
                  
               }
            });
      }
    </script>
    

  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      <h2>Projects | <a href="{{ url('/projects/create') }}"> &nbsp;+&nbsp;</a></h2>
      <hr>

      @if (\Session::has('success'))
        <div class="alert alert-success" id='msg'>
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      
      <div id='msg'></div>

      <table class="table table-striped">
        
        <thead>
          <tr>
            <th class="mobile_hide">ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>URL</th>
            <th>Teaser</th>
            <th class="mobile_hide">Desc</th>
            <th class="mobile_hide_5s">Categories</th>
            <th class="mobile_hide">Order</th>
            <th>Active</th>

            <th colspan="2">Action</th>
          </tr>
        </thead>
        
        <tbody id="sortable">
          @foreach($projects as $project)
          <tr class="ui-state-default" rel="{{$project['project_id']}}">
            <td class="mobile_hide">{{$project['project_id']}}</td>
            <td>{{$project['project_name']}}</td>
            <td><img src="{{$project['project_image']}}"></td>
            <td>@if($project['project_url'] == '#') # @else <a href="{{$project['project_url']}}" target="_blank" title="{{$project['project_url']}}">Link</a> @endif</td>
            <td>{{$project['project_teaser']}}</td>
            <td class="mobile_hide">{{strlen($project['project_text'])}} Chars</td>
            <td class="cms_category mobile_hide_5s">
              @foreach(unserialize($project['project_categories']) as $category)
                <span>{{$category}}</span>
              @endforeach
            </td>  
            <td class="mobile_hide">{{$project['project_order']}}</td>
            <td>{{$project['project_active']}}</td>

            <td><a href="{{action('ProjectController@edit', $project['project_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('ProjectController@destroy', $project['project_id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">X</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>


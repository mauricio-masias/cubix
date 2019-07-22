@extends('layouts.projectsAdmin')

@section('content')
    <div class="container">
    
      <h2>Projects | <a href="{{ url('/projects/create') }}"> &nbsp;+&nbsp;</a></h2>
      <hr>

      <div id='msg'>
      @if (\Session::has('success'))
        <div class="alert alert-success" id='msg'>
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      </div>

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
            <td><img src="{{$project['project_image']}}" style="width:100px"></td>
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

            <td><a href="{{action('Admin\ProjectController@edit', $project['project_id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('Admin\ProjectController@destroy', $project['project_id'])}}" method="post">
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
@endsection


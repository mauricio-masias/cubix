@extends('galleries.galleryMaster')

@section('content')

    <h2>Galleries | <a href="{{ url('/galleries/create') }}"> &nbsp;+&nbsp;</a></h2>
    <hr>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif


    <div class="row">
        <div class="col-md-8">
            @if (count($galleries) > 0)
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Gallery name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{$gallery->name}}
                                <span class="pull-right">{{$gallery->media()->count()}}</span>
                            </td>
                            <td><a href="{{action('GalleryAdminController@show', $gallery->id)}}" class="btn">View</a>
                                <a href="{{action('GalleryAdminController@edit', $gallery->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{action('GalleryAdminController@destroy', $gallery->id, 'gallery')}}" method="post" style="display: inline-block;">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No records found.</p>
            @endif

        </div>
        <div class="col-md-4">

            @if(isset($id))

            <form method="post" action="{{action('MenuController@update', $id)}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="form-group">
                        <input type="text" name="gallery_name" id="gallery_name" placeholder="Gallery name" class="form-control" value="{{$gallery_to_update('name')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="price" style="float:left">Active:</label>
                        <input style="width:20%;float:left;margin-left: 5px" type="checkbox" name="gallery_active" id="gallery_active"  value="1" @if($gallery_to_update('active')==1) checked="checked" @endif>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>

            @else

            <form class="form" method="post" action="{{action('GalleryAdminController@store')}}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="form-group">
                        <input type="text" name="gallery_name" id="gallery_name" placeholder="Gallery name" class="form-control" value="{{old('gallery_name')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="price" style="float:left">Active:</label>
                        <input style="width:20%;float:left;margin-left: 5px" type="checkbox" name="gallery_active" id="gallery_active"  value="1">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

            @endif

        </div>

    </div>


@endsection
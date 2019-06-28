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
                            <td><a href="{{action('GalleryAdminController@show', $gallery->id)}}">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No records found.</p>
            @endif

        </div>
        <div class="col-md-4">
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

        </div>

    </div>


@endsection
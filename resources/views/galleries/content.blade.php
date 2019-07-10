@extends('layouts.galleriesAdmin')

@section('content')

    <h2>Gallery: {{ $gallery->name }} | <a href="{{ url('/galleries') }}"> < Back&nbsp;</a></h2>
    <hr>

    <div id="gallery_messages">
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
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages" >
                {{ csrf_field() }}
                <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                <input type="hidden" name="gallery_name" value="{{$gallery->name}}">

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
           <div id="cms-gallery-images" class="list-group">

               @forelse($gallery->media as $image)

                   <div class="item list-group-item" rel="{{$image->id}}">
                       <img src="{{ asset($image->file_path . $image->file_name) }}" alt="{{$gallery->name}}">
                       <div class="action_overlay">
                           <form action="{{action('Admin\GalleryAdminController@destroy',$image->id)}}" method="post" style="display: inline-block;">
                               {{csrf_field()}}
                               <input name="_method" type="hidden" value="DELETE">
                               <input name="order" type="hidden" value="$image->file_order">
                               <button class="btn btn-danger" type="submit">X</button>
                           </form>
                       </div>
                   </div>

               @empty
                   <p class="no_images">No images found.</p>
               @endforelse

           </div>
        </div>
    </div>


    <script>var basepath = '{{URL::to('/')}}/';</script>




@endsection
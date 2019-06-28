@extends('galleries.galleryMaster')

@section('content')

    <h2>Gallery: {{ $gallery->name }} | <a href="{{ url('/galleries') }}"> < Back&nbsp;</a></h2>
    <hr>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif


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
           <div id="cms-gallery-images">

               @foreach($gallery->media as $image)

                   <div class="item" >
                       <img src="{{ asset($image->file_path . $image->file_name) }}" alt="{{$gallery->name}}">
                   </div>

               @endforeach

           </div>
        </div>
    </div>

    <script>var filepath = '{{ asset($image->file_path) }}/';</script>




@endsection
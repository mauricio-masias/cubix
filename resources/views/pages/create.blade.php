@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Create Page | <a href="{{ url('/pages') }}"> &lt; Back</a></h2><br />
      <hr>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif

      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif

      <form method="post" action="{{url('pages')}}" enctype="multipart/form-data">
         {{csrf_field()}}


       <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Title: *</label>
            <input type="text" class="form-control" name="title" value="{!! old('title') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Subtitle: *</label>
            <input type="text" class="form-control" name="subtitle" value="{!! old('subtitle') !!}">
          </div>
        </div>
        
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Project not available: *</label>
              <input type="text" class="form-control" name="no_available" value="{!! old('no_available') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Project available: *</label>
              <input type="text" class="form-control" name="available" value="{!! old('available') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer year: (Empty for default:2018)</label>
               <input type="text" class="form-control" name="footer_year" value="{!! old('footer_year') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer phone:</label>
               <input type="text" class="form-control" name="footer_phone" value="{!! old('footer_phone') !!}">
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer email:</label>
               <input type="text" class="form-control" name="footer_email" value="{!! old('footer_email') !!}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">PDF label</label>
             <input type="text" class="form-control" name="pdf_name" value="{!! old('pdf_name') !!}">

          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">PDF to Download:</label>
              <input type="file" name="pdf" > 
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">GA tracking code</label>
             <input type="text" class="form-control" name="ga_code" value="{!! old('ga_code') !!}">

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Meta description *</label>
            <textarea name="meta_description" cols="80" rows="5">{!! old('meta_description') !!}</textarea>

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Meta Open Graph</label>
              <textarea name="og" cols="80" rows="17">{!! old('og') !!}</textarea>

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Meta Twitter Card</label>
              <textarea name="card" cols="80" rows="17">{!! old('card') !!}</textarea>

          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Extra JS code on header</label>
              <textarea name="extra_js" cols="80" rows="17">{!! old('extra_js') !!}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Extra JS code on footer</label>
              <textarea name="extra_js_footer" cols="80" rows="17">{!! old('extra_js_footer') !!}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" value="1" name="active" @if(old('active') == 1) checked @endif>
          </div>
        </div>
      

        <hr>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Add Page</button>
          </div>
        </div>

      </form>

    </div>
@endsection

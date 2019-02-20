<!-- edit.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Edit Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    @include('nav')

    <div class="container">
      <h2>Edit Page | <a href="{{ url('/pages') }}"> &lt; Back</a></h2>
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
      <form method="post" action="{{action('PageController@update', $id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Title: *</label>
            <input type="text" class="form-control" name="title" value="{{$page->page_title}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Subtitle: *</label>
            <input type="text" class="form-control" name="subtitle" value="{{$page->page_subtitle}}">
          </div>
        </div>
        
         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Project not available: *</label>
              <input type="text" class="form-control" name="no_available" value="{{$page->page_not_available}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
             <label for="price">Project available: *</label>
              <input type="text" class="form-control" name="available" value="{{$page->page_available}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer Year (Empty for default:2018)</label>
             <input type="text" class="form-control" name="footer_year" value="{{$page->page_footer_year}}">

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer phone</label>
             <input type="text" class="form-control" name="footer_phone" value="{{$page->page_footer_phone}}">

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Footer email</label>
             <input type="text" class="form-control" name="footer_email" value="{{$page->page_footer_email}}">

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">PDF label</label>
             <input type="text" class="form-control" name="pdf_name" value="{{$page->page_pdf_name}}">

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
             <input type="text" class="form-control" name="ga_code" value="{{$page->page_ga_code}}">

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Meta description *</label>
              <textarea name="meta_description" cols="80" rows="5">{{$page->page_meta_description}}</textarea>

          </div>
        </div>


        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Meta Open Graph</label>
              <textarea name="og" cols="80" rows="17">{{$page->page_og}}</textarea>

          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Meta Twitter Card</label>
              <textarea name="card" cols="80" rows="17">{{$page->page_card}}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Extra JS code on header</label>
              <textarea name="extra_js" cols="80" rows="17">{{$page->page_extra_js}}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="price">Extra JS code on footer</label>
              <textarea name="extra_js_footer" cols="80" rows="17">{{$page->page_extra_js_footer}}</textarea>
          </div>
        </div>

         <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Active:</label>
            <input type="checkbox" name="active" value="1" @if($page->page_active == 1) checked @endif> 
          </div>
        </div>

        
        <hr>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Page</button>
          </div>
        </div>
      
      </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Galleries</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      @yield('content')

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
  </body>
</html>


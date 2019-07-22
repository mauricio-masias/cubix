<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Galleries</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <style>
      .sortable-ghost { width: 20%; line-height: 1.2em; background:#f00; margin: 0; padding: 5px;border:none}
      .sortable-chosen { border:1px solid #f00}
    </style>

  </head>
  
  <body>
    
    @include('nav')

    <div class="container">
    
      @yield('content')

    </div>

    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <script>
      Dropzone.options.addImages = {
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        success: function (file, response) {
          if (file.status == 'success') {
            handleDropzoneFileUpload.handleSuccess(response);
          } else {
            handleDropzoneFileUpload.handleError(response);
          }
        },
        error: function (file, response) {
          handleDropzoneFileUpload.handleError(response);
        }
      }

      var handleDropzoneFileUpload = {
        handleError: function (response) {

          var wrap = $('#gallery_messages');
          $(wrap).append('<div class="alert alert-danger"><ul><li>' + response.message + '</li></ul></div><br />');
        },
        handleSuccess: function (response) {

          $('.no_images').hide();
          var wrap = $('#cms-gallery-images');
          var src = '{{ url('/') }}' +'/'+ response.file_path + response.file_name;

          var mini_form = '<div class="action_overlay"><form action="' + response.action + response.id + '" method="post" style="display: inline-block;">';
          mini_form += '<input type="hidden" name="_token" value="' + response.csrf + '">';
          mini_form += '<input name="_method" type="hidden" value="DELETE">';
          mini_form += '<button class="btn btn-danger" type="submit">X</button></form></div>';

          $(wrap).append('<div class="item" ><img src="' + src + '">' + mini_form + '</div>');

          updateOrder();
        }
      };

      function updateOrder(){

        var order_ids=[];
        $('#cms-gallery-images .item').each(function(){order_ids.push($(this).attr('rel'));})
        sendNewGalleryOrder(order_ids);
      }

      function sendNewGalleryOrder(order_ids){
        var order_ids_ready = encodeURIComponent(JSON.stringify(order_ids));
        $.ajax({
          type:'POST',
          url:'{{ url('/new-gallery-order') }}',
          data:{_token : "<?php echo csrf_token(); ?>",ids:order_ids_ready},
          success:function(data){
            if(data.status!='ok'){
              $("#gallery_messages").hide().html('<div class="alert alert-danger"><ul><li>'+data.error+'</li></ul></div>').fadeIn(200);
            }else{
              $("#gallery_messages").hide().html('<div class="alert alert-success"><ul><li>New order saved</li></ul></div>').fadeIn(200);
            }

          }
        });
      }

      $(document).ready(function () {

        var imageGrid = document.getElementById('cms-gallery-images');
        new Sortable(imageGrid, {
          animation: 150,
          ghostClass: "sortable-ghost",
          chosenClass: "sortable-chosen",
          onEnd: function (e) {
            updateOrder();
          }
        });
      });
    </script>

  </body>
</html>


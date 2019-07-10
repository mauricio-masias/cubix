<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} : Projects</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <style>
        #sortable {  margin: 0; padding: 0;  }
        .ui-state-highlight { height: 150px; line-height: 1.2em; background:#0d0!important; margin: 0 5px 5px 5px; padding: 5px;}
    </style>

</head>

<body>

<div id="app">
    @include('nav')


    @yield('content')
</div>

<script src="{{ asset('js/admin.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

</body>
</html>


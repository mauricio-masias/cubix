<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{$site['page_title']}} : {!! !empty($page) ? $page['page_title'] : $site['page_subtitle'] !!}</title>

    <link rel="canonical" href="http://cubix.club/" />
    <meta name="description" content="{{$site['page_meta_description']}}">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,minimal-ui">

    @if($site['page_og'] != null){!! $site['page_og'] !!}@endif
	
    @if($site['page_card'] != null){!! $site['page_card'] !!}@endif
    
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/polygons.min.css') }}">
    
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- GA code -->
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','{{ asset("/js/ganalytics.js") }}','ga');ga('create', '{{$site['page_ga_code']}}', 'auto');ga('send', 'pageview');</script>
 	<!-- GA code end -->

    @if($site['page_extra_js']!= null)
    {!! $site['page_extra_js'] !!}
    @endif

    @if(!empty($page) && $page['page_extra_js']!= null)
    {!! $page['page_extra_js'] !!}
    @endif

</head>


<body>
    <!--[if lt IE 9]>
        <div class="browsehappy">
        	<div class="browse_content">
                <div class="logoie"></div>
                <div class="contentie">No soup for you !<br /> Your browser is too old - Seems you're technologically challenged or your system administrator is in a coma. <br /><br /><a href="http://windows.microsoft.com/en-GB/internet-explorer/download-ie">Upgrade your browser</a> to enjoy a full experience.</div>
            </div>
    	</div>
    <![endif]-->



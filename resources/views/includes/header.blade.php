<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{$pages['page_title']}} : {{$pages['page_subtitle']}}</title>
    <link rel="canonical" href="http://masias.co.uk/" />
    <meta name="description" content="{{$pages['page_meta_description']}}">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,minimal-ui">

    @if($pages['page_og'] != null){!! $pages['page_og'] !!}@endif
	
    @if($pages['page_card'] != null){!! $pages['page_card'] !!}@endif
    
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
    <style>@font-face {
  font-family: 'Nova Flat';
  font-style: normal;
  font-weight: 400;
  src: local('Nova Flat'), local('NovaFlat'), url(https://fonts.gstatic.com/s/novaflat/v10/QdVUSTc-JgqpytEbVeb0viFluW44JQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
a,abbr,acronym,address,applet,big,blockquote,body,caption,cite,code,dd,del,dfn,div,dl,dt,em,fieldset,font,form,h1,h2,h3,h4,h5,h6,html,iframe,ins,kbd,label,legend,li,object,ol,p,pre,q,s,samp,small,span,strike,strong,sub,sup,table,tbody,td,tfoot,th,thead,tr,tt,ul,var{border:0;font-family:inherit;font-size:100%;font-style:inherit;font-weight:inherit;margin:0;outline:0;padding:0;vertical-align:baseline}html{font-size:62.5%;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}body{background:#000}article,aside,details,figcaption,figure,footer,header,main,nav,section{display:block}table{border-collapse:separate;border-spacing:0}caption,td,th{font-weight:400;text-align:left}blockquote:after,blockquote:before,q:after,q:before{content:""}blockquote,q{quotes:"" ""}a img{border:0}body,button,input,select,textarea{color:#404040;font-family:sans-serif;font-size:15px;font-size:1.5rem;line-height:1.5}h1,h2,h3,h4,h5,h6{clear:both}p{margin-bottom:1.5em}b,strong{font-weight:700}cite,dfn,em,i{font-style:italic}blockquote{margin:0 1.5em}address{margin:0 0 1.5em}abbr,acronym{border-bottom:1px dotted #666;cursor:help}ins,mark{background:#fff9c0;text-decoration:none}sub,sup{font-size:75%;height:0;line-height:0;position:relative;vertical-align:baseline}sup{bottom:1ex}sub{top:.5ex}small{font-size:75%}big{font-size:125%}hr{background-color:#ccc;border:0;height:1px;margin-bottom:1.5em}ol,ul{margin:0 0 1.5em 3em}ul{list-style:disc}ol{list-style:decimal}li>ol,li>ul{margin-bottom:0;margin-left:1.5em}dt{font-weight:700}dd{margin:0 1.5em 1.5em}img{height:auto;max-width:100%}figure{margin:0}table{margin:0 0 1.5em;width:100%}th{font-weight:700}button,input,select,textarea{font-size:100%;margin:0;vertical-align:baseline}button,input[type=button],input[type=reset],input[type=submit]{border:none;background:rgba(0,0,0,.5);color:#fff;cursor:pointer;-webkit-appearance:button;font-size:12px;font-size:14px;line-height:1;padding:.6em 1em .4em;font-family: 'Nova Flat', cursive;}button:hover,input[type=button]:hover,input[type=reset]:hover,input[type=submit]:hover{border:none;background:rgba(0,0,0,.8);color:#fff}button:active,button:focus,input[type=button]:active,input[type=button]:focus,input[type=reset]:active,input[type=reset]:focus,input[type=submit]:active,input[type=submit]:focus{border-color:#aaa #bbb #bbb;-webkit-box-shadow:inset 0 -1px 0 rgba(255,255,255,.5),inset 0 2px 5px rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(255,255,255,.5),inset 0 2px 5px rgba(0,0,0,.15)}input[type=checkbox],input[type=radio]{padding:0}input[type=search]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-decoration{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input[type=email],input[type=password],input[type=search],input[type=text],input[type=url],textarea{color:#666;border:1px solid #e5e5e5}input[type=email]:focus,input[type=password]:focus,input[type=search]:focus,input[type=text]:focus,input[type=url]:focus,textarea:focus{color:#111}input[type=email],input[type=password],input[type=search],input[type=text],input[type=url]{padding:3px}textarea{overflow:auto;padding-left:3px;vertical-align:top;width:100%}a,a:active,a:focus,a:hover,a:visited{outline:0;text-decoration:none}.buttonx,.thumb a,footer,h1,h2,h3,nav{font-family: 'Nova Flat', cursive;}h1{font-size:40px}h2{font-size:26px}h3{font-size:20px}

    footer{position:fixed;background:rgba(0,0,0,.5);color:#fff;font-size:12px;bottom:0;width:100%;height:35px}
    footer div{margin:0 auto;padding-top:12px}
    
    /* test */
    .row.header{with:100%;height:500px;margin-top:50px;}
    .row.header div{
        display:flex;
        align-items: center;
        justify-content: center;
    }
    .row.header div img{
         max-width: 50%;
    }

    .row.belowheader{width:100%;margin:50px 0;}
    .row.belowheader .date{ 
        display:flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        color:#fff;
    }

    h3{font-size:40px;line-height:42px;}
    h4{font-size:27px;line-height:29px;}
    h5{font-size:20px;line-height:22px;}


    .row.belowheader .date h3{width:100%;text-align: center}
    .row.belowheader .date h4{width:100%;text-align: center;margin:20px 0;}
    .row.belowheader .date h5{width:100%;text-align: center}

    .boxes{width:100%;margin:100px 0;}
    .box{color:#fff;
        display:flex;
        align-items: center;
        justify-content: center;
        font-size:30px;
        line-height: 32px;
        align-self: flex-start;
    }
    .box a,.box a:visited{color:#f00;}
    .box.b1{text-align: left}
    .box.b2{text-align: center}
    .box.b3{text-align: right}
    .box ul{list-style: none;margin:0;padding:0;}
    .box h3{margin-bottom: 20px; color:335;}

    /* end test */

    *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
    
    video {position: fixed;top: 50%;left: 50%;min-width: 100%;min-height: 100%;width: auto;height: auto;z-index: -100;transform: translateX(-50%) translateY(-50%);transition: 1s opacity;}
    .video-background{background:#000;position:fixed;top:0;right:0;bottom:0;left:0;z-index:-99}
    .video-background iframe,
    .video-foreground{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none}
    @media (min-aspect-ratio:16 / 9){.video-foreground{height:300%;top:-100%}}
    @media (max-aspect-ratio:16 / 9){.video-foreground{width:300%;left:-100%}}
    
    @media screen and (max-width:768px){
        #player{display:none}
        .video-foreground{background:url(../img/wave5.jpg) no-repeat;background-position:center;background-size:cover}
    }

    /* rotate */
    .movement2 {
        -webkit-animation-name: rotate; 
        -webkit-animation-duration: 240s; 
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
        -moz-animation-name: rotate; 
        -moz-animation-duration: 240s; 
        -moz-animation-iteration-count: infinite;
        -moz-animation-timing-function: linear;
        animation-name: rotate; 
        animation-duration: 240s; 
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @-webkit-keyframes rotate {
        from {-webkit-transform: rotate(0deg);}
        to {-webkit-transform: rotate(-360deg);}
    }

    @-moz-keyframes rotate {
        from {-moz-transform: rotate(0deg);}
        to {-moz-transform: rotate(-360deg);}
    }

    @keyframes rotate {
        from {transform: rotate(0deg);}
        to {transform: rotate(-360deg);}
    }
    
    
       </style>
    <link rel="stylesheet" href="/css/polygons.css">  
    
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- GA code -->
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','{{ asset("/js/ganalytics.js") }}','ga');ga('create', '{{$pages['page_ga_code']}}', 'auto');ga('send', 'pageview');</script>
 	<!-- GA code end -->

    @if($pages['page_extra_js']!= null)
    {!! $pages['page_extra_js'] !!}
    @endif

</head>


<body>
    <!--[if lt IE 9]>
        <div class="browsehappy">
        	<div class="browse_content">
                <div class="logoie"></div>
                <div class="contentie">No soup for you !<br /> Your browser is too old - Seems you're techonoligally challenged or your system administrator is in a coma. <br /><br /><a href="http://windows.microsoft.com/en-GB/internet-explorer/download-ie">Upgrade your browser</a> to enjoy a full experience.</div>
            </div>
    	</div>
    <![endif]-->



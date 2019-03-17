<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{$site['page_title']}} : {!! !empty($page) ? $page['page_title'] : $site['page_subtitle'] !!}</title>

    <link rel="canonical" href="http://masias.co.uk/" />
    <meta name="description" content="{{$site['page_meta_description']}}">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,minimal-ui">

    @if($site['page_og'] != null){!! $site['page_og'] !!}@endif
	
    @if($site['page_card'] != null){!! $site['page_card'] !!}@endif
    
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>body{font-family: 'Nova Flat',cursive;width: 100%;height: 100%;background: #000;}a img,hr{border:0}@font-face{font-family:'Nova Flat';font-style:normal;font-weight:400;src:local('Nova Flat'),local('NovaFlat'),url(https://fonts.gstatic.com/s/novaflat/v10/QdVUSTc-JgqpytEbVeb0viFluW44JQ.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}a,abbr,acronym,address,applet,big,blockquote,body,caption,cite,code,dd,del,dfn,div,dl,dt,em,fieldset,font,form,h1,h2,h3,h4,h5,h6,html,iframe,ins,kbd,label,legend,li,object,ol,p,pre,q,s,samp,small,span,strike,strong,sub,sup,table,tbody,td,tfoot,th,thead,tr,tt,ul,var{border:0;font-size:100%;font-style:inherit;font-weight:inherit;margin:0;outline:0;padding:0;vertical-align:baseline}hr,p{margin-bottom:0.5em}html{height:100%;font-size:62.5%;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}*,:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}article,aside,details,figcaption,figure,footer,header,main,nav,section{display:block}caption,td,th{font-weight:400;text-align:left}blockquote:after,blockquote:before,q:after,q:before{content:""}blockquote,q{quotes:"" ""}body,button,input,select,textarea{color:#404040;font-size:15px;font-size:1.5rem;line-height:1.5}small,sub,sup{font-size:75%}h1,h2,h3,h4,h5,h6{clear:both}b,dt,strong,th{font-weight:700}cite,dfn,em,i{font-style:italic}blockquote{margin:0 1.5em}address{margin:0 0 1.5em}abbr,acronym{border-bottom:1px dotted #666;cursor:help}ins,mark{background:#fff9c0;text-decoration:none}sub,sup{height:0;line-height:0;position:relative;vertical-align:baseline}sup{bottom:1ex}sub{top:.5ex}big{font-size:125%}hr{background-color:#ccc;height:1px}ol,ul{margin:0 0 1.5em 3em}ul{list-style:disc}ol{list-style:decimal}li>ol,li>ul{margin-bottom:0;margin-left:1.5em}dd{margin:0 1.5em 1.5em}img{height:auto;max-width:100%}figure{margin:0}table{border-collapse:separate;border-spacing:0;margin:0 0 1.5em;width:100%}button,input,select,textarea{font-size:100%;margin:0;vertical-align:baseline}button,input[type=button],input[type=reset],input[type=submit]{border:none;background:rgba(0,0,0,.5);color:#fff;cursor:pointer;-webkit-appearance:button;font-size:12px;font-size:14px;line-height:1;padding:.6em 1em .4em;font-family:'Nova Flat',cursive}button:hover,input[type=button]:hover,input[type=reset]:hover,input[type=submit]:hover{border:none;background:rgba(0,0,0,.8);color:#fff}button:active,button:focus,input[type=button]:active,input[type=button]:focus,input[type=reset]:active,input[type=reset]:focus,input[type=submit]:active,input[type=submit]:focus{border-color:#aaa #bbb #bbb;-webkit-box-shadow:inset 0 -1px 0 rgba(255,255,255,.5),inset 0 2px 5px rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(255,255,255,.5),inset 0 2px 5px rgba(0,0,0,.15)}input[type=checkbox],input[type=radio]{padding:0}input[type=search]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-decoration{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input[type=email],input[type=password],input[type=search],input[type=text],input[type=url],textarea{color:#666;border:1px solid #e5e5e5}input[type=email]:focus,input[type=password]:focus,input[type=search]:focus,input[type=text]:focus,input[type=url]:focus,textarea:focus{color:#111}input[type=email],input[type=password],input[type=search],input[type=text],input[type=url]{padding:3px}textarea{overflow:auto;padding-left:3px;vertical-align:top;width:100%}a,a:active,a:focus,a:hover,a:visited{outline:0;text-decoration:none}.buttonx,.thumb a,footer,h1,h2,h3,nav{font-family:'Nova Flat',cursive}h1{font-size:40px}h2{font-size:26px}.desc_container{font-family: 'Nova Flat',cursive;align-items: baseline;height: fit-content;margin-top: 30px;}.row.belowheader .date h3,.row.belowheader .date h4,.row.belowheader .date h5{text-align:center;width:100%;font-weight:300}footer,video{position:fixed}footer{background:rgba(0,0,0,.5);color:#fff;font-size:12px;bottom:0;width:100%;height:35px}footer div{margin:0 auto;padding-top:12px;width:285px;}.row.header{margin-top:100px}.row.header div{display:flex;align-items:center;justify-content:center}.row.header div img{max-width:50%}.row.belowheader{width:100%;margin:50px 0}.row.belowheader .date{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;color:#fff}h3{font-size:40px;line-height:42px}h4{font-size:27px;line-height:29px}h5{font-size:20px;line-height:22px}.row.belowheader .date h4{margin:10px 0}.boxes{width:100%;margin:100px 0}.box{color:#fff;display:flex;align-items:center;justify-content:center;font-size:30px;line-height:32px;align-self:flex-start;font-weight:300}.box a,.box a:visited{color:palevioletred}.box li{margin-bottom: 10px;}.box.b1{text-align:left;justify-content: flex-start;}.box.b2{text-align:center}.box.b3{text-align:right}.box ul{list-style:none;margin:0;padding:0}.box h3{margin-bottom:20px;color:#88b}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.description{font-size:14px;color:#fff;line-height:16px;max-width:40%;word-spacing: 1px;text-align: center;}@media screen and (max-width:991px) and (min-width:768px){.box.b2{text-align:right;justify-content:flex-end}.box.b3{width:100%;max-width:100%;flex:0 0 100%;text-align:center;margin-top:30px}}@media screen and (max-width:768px){.row.header div img {max-width: 80%;}description{width:80%;max-width: 80%}}@media screen and (max-width:767px){.box.b1,.box.b2,.box.b3{text-align:center;justify-content: center;}.description{width:90%;max-width: 90%}.box.b2,.box.b3{margin-top:60px}.row.header{margin-top:50px;}.boxes{margin:50px 0}.row.belowheader .date h4{margin:10px 0}}.show_404{text-align:center;color:#fff;position: relative;}
        .social_icons{display:flex;flex-wrap:wrap;width:100%;margin:10px 0 20px 0;}.social_icons a{width:33%;font-size:50px;margin-bottom:20px;color:#f1f1f1!important}.social_icons a:nth-child(2),.social_icons a:nth-child(5){text-align:center;}.social_icons a:nth-child(3),.social_icons a:nth-child(6){text-align:right;}h1{color:#f1f1f1}.djitem img{width:100%;margin:20px 0;}.djitem{color:#f1f1f1}.djlinks{list-style:none;margin:20px 0 0 0;}.djlinks a{font-size:20px;line-height: 20px;margin-bottom:5px;color:#f1f1f1;}</style>
     <link rel="stylesheet" href="/css/polygons.min.css">  
    
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
                <div class="contentie">No soup for you !<br /> Your browser is too old - Seems you're techonoligally challenged or your system administrator is in a coma. <br /><br /><a href="http://windows.microsoft.com/en-GB/internet-explorer/download-ie">Upgrade your browser</a> to enjoy a full experience.</div>
            </div>
    	</div>
    <![endif]-->



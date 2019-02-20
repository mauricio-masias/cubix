@include('includes.header')
    

<div class="video-background">
<div class="video-foreground">

<video poster="{{ asset('/img/portfolio/placeholder.jpg') }}" id="bgvid" playsinline autoplay muted loop>
<source src="{{ asset('/vid/waves-mmb.webm') }}" type="video/webm">
<source src="{{ asset('/vid/waves-mmb.mp4') }}" type="video/mp4">
</video>

</div>
</div>


<div class="container-fluid">
 
    <header>
        <h1>{{$pages['page_title']}}</h1>
        <h2>{{$pages['page_subtitle']}}</h2>
    </header>


    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            {!! $boxes[0]['box_content'] !!}
        </div>
    </div>


     <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            {!! $boxes[1]['box_content'] !!}
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            {!! $boxes[2]['box_content'] !!}
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            {!! $boxes[3]['box_content'] !!}
        </div>
    </div>

</div>




@include('includes.footer')
    
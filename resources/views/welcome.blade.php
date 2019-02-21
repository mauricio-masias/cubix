@include('includes.header')
    

<div class="video-background movement2">
<div class="video-foreground">

<video poster="{{ asset('/img/portfolio/placeholder.jpg') }}" id="bgvid" playsinline autoplay muted loop>
<source src="{{ asset('/vid/waves-mmb.webm') }}" type="video/webm">
<source src="{{ asset('/vid/waves-mmb.mp4') }}" type="video/mp4">
</video>

</div>
</div>


<div class="container-fluid">
 
    <div class="row header">
        <div class="col-sm-12 col-md-12 col-lg-12">
            {!! $boxes[4]['box_content'] !!}
        </div>
    </div>


    <div class="row belowheader">
        <div class="col-sm-12 col-md-12 col-lg-12 date">
            {!! $boxes[0]['box_content'] !!}
        </div>
    </div>


    <div class="row boxes">
        <div class="col-sm-12 col-md-6 col-lg-4 box b1">
            {!! $boxes[1]['box_content'] !!}
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 box b2">
            {!! $boxes[2]['box_content'] !!}
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 box b3">
            {!! $boxes[3]['box_content'] !!}
        </div>
    </div>

</div>




@include('includes.footer')
    
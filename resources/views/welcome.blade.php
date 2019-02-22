@include('includes.header')
    
<div class="polygon-container">
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
    <div class="polygon"></div>
</div>


<div class="container-fluid">
 
    <div class="row header">
        <div class="col-sm-12 col-md-12 col-lg-12">
            {!! $boxes[5]['box_content'] !!}
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 desc_container">
            <div class="description">{!! $boxes[4]['box_content'] !!}</div>
        </div>
    </div>


    <div class="row belowheader">
        <div class="col-sm-12 col-md-12 col-lg-12 date">
            {!! $boxes[0]['box_content'] !!}
        </div>
    </div>


    <div class="row boxes">
        <div class="col-sm-12 col-md-6 col-lg-4 box b1">
            <div>{!! $boxes[1]['box_content'] !!}</div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 box b2">
             <div>{!! $boxes[2]['box_content'] !!}</div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 box b3">
             <div>{!! $boxes[3]['box_content'] !!}</div>
        </div>
    </div>

</div>




@include('includes.footer')
    
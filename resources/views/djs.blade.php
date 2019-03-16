@include('includes.header')
    
@include('includes.polygon')


<div class="container">
 
    <div class="row header">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1>DJS</h1>
            
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 desc_container">
            <div class="description">Some text here</div>
        </div>
    </div>
    

    <div class="row boxes">

        @foreach ($projects as $project)
                
       

        <div class="col-sm-12 col-md-6 col-lg-3 djbox b{{$loop->iteration}}">
            <div>
                {!! $project['project_name'] !!}

                {!! $project['project_image'] !!}
                
                <a href="{!! $project['project_url'] !!}" target="_blank">Visit Website</a>
                
                {!! $project['project_text'] !!}
            </div>
        </div>

        @endforeach

        

    </div>

</div>




@include('includes.footer')
    
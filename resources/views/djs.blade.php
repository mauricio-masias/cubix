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

        <div class="col-sm-12 col-md-6 col-lg-3 box b1">
            <div>
                {!! $projects[5]['project_name'] !!}

                {!! $projects[5]['project_image'] !!}
                
                <a href="{!! $projects[5]['project_url'] !!}" target="_blank">Visit Website</a>
                
                {!! $projects[5]['project_text'] !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 box b2">
             <div>
                {!! $projects[5]['project_name'] !!}

                {!! $projects[5]['project_image'] !!}
                
                <a href="{!! $projects[5]['project_url'] !!}" target="_blank">Visit Website</a>
                
                {!! $projects[5]['project_text'] !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-3 box b2">
             <div>
                {!! $projects[5]['project_name'] !!}

                {!! $projects[5]['project_image'] !!}
                
                <a href="{!! $projects[5]['project_url'] !!}" target="_blank">Visit Website</a>
                
                {!! $projects[5]['project_text'] !!}
            </div>
        </div>

         <div class="col-sm-12 col-md-6 col-lg-3 box b4">
            <div>
                {!! $projects[5]['project_name'] !!}

                {!! $projects[5]['project_image'] !!}
                
                <a href="{!! $projects[5]['project_url'] !!}" target="_blank">Visit Website</a>
                
                {!! $projects[5]['project_text'] !!}
            </div>
        </div>

    </div>

</div>




@include('includes.footer')
    
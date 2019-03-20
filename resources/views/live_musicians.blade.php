@include('includes.header')
    
@include('includes.polygon')


<div class="container">
 
    <div class="row header">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1>{{$page['page_title']}}</h1>
            
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 desc_container">
            <div class="description">{{$page['page_subtitle']}}</div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
             <a href="/">< Back</a>
        </div>
       
    </div>
    

    <div class="row boxes">

        @foreach ($projects as $project)
        
            @foreach (unserialize($project['project_categories']) as $cat)
                
                @if($cat == 'live_musician') 
                
                     <div class="col-sm-12 col-md-6 col-lg-4 djbox b{{$loop->iteration}}">
                        <div class="djitem">
                            <h2>{!! $project['project_name'] !!}</h2>

                            <a href="{!! $project['project_url'] !!}" target="_blank">
                            <img src="{!! $project['project_image'] !!}" alt="{!! $project['project_name'] !!}">
                            </a>
                            
                            <div class="dj_content">{!! $project['project_text'] !!}</div>
                        </div>
                    </div>

                @endif 
            
            @endforeach

        @endforeach

    </div>

</div>




@include('includes.footer')
    
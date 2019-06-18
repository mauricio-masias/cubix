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
             <a href="{{url('/')}}">< Back</a>
        </div>
       
    </div>
    

    <section class="gallery">
        <div class="grid">


            <div class="grid-sizer"></div>
            @for($i = 1; $i <= 15; $i++)
                
                <div class="item @if($i % 100 == 0) item--width2 @endif">
                    <div class="cont">
                            
                        <a class="imgcontainer"><img src="{{ asset('img/chapters/'.$folder.'/snap'.$i.'.jpg')}}" alt="image title" /></a>

                    </div>
                </div>

            @endfor

        </div>
    </section>

</div>




@include('includes.footer')
    
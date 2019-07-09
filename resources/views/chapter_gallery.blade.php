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
            @foreach($media as $image)

                <div class="item">
                    <div class="cont">
                            
                        <a href="{{asset($image->file_path.$image->file_name)}}" class="imgcontainer" data-lightbox="{{$page['page_title']}}"><img src="{{asset($image->file_path.$image->file_name)}}" alt="{{$site['page_title']}}: {{$page['page_title']}}" /></a>

                    </div>
                </div>

            @endforeach

        </div>
    </section>

</div>




@include('includes.footer')
    
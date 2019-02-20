@include('includes.header')
    

<div class="video-background">
<div class="video-foreground">

<video poster="{{ asset('/img/portfolio/placeholder.jpg') }}" id="bgvid" playsinline autoplay muted loop>
<source src="{{ asset('/vid/waves-mmb.webm') }}" type="video/webm">
<source src="{{ asset('/vid/waves-mmb.mp4') }}" type="video/mp4">
</video>

</div>
</div>

<header>
<h1>{{$pages['page_title']}}</h1>
<h2>{{$pages['page_subtitle']}}</h2>
</header>

<div id="wrap" class="wrap_404">
    <nav>
        <ul>
            <li><a href="http://masias.co.uk/#about" rel="0" target="_blank">About me</a></li>
            <li><a href="http://masias.co.uk/#works" rel="0" target="_blank">Works</a></li>
            <li><a href="http://masias.co.uk/#cv" rel="0" target="_blank">CV</a></li>
            <li><a href="https://www.linkedin.com/in/mauriciomasias/" rel="0" target="_blank">LinkedIn</a></li>
        </ul>
    </nav>

    <section>
        <div class="show_404">
            <h2>Sorry !</h2>
            <h3>The page you looking for has probaly sunk somewhere</h3>
            <br />
            <br />
            <br />
            <h2 class="desk_only">You can...</h2>
            <h3 class="desk_only">find everything you looking for by clicking on the menu options.</h3>
            <nav class="mob_only">
                <ul>
                    <li><a href="http://masias.co.uk/#about" rel="0" target="_blank">About me</a></li>
                    <li><a href="http://masias.co.uk/#works" rel="0" target="_blank">Works</a></li>
                    <li><a href="http://masias.co.uk/#cv" rel="0" target="_blank">CV</a></li>
                    <li><a href="https://www.linkedin.com/in/mauriciomasias/" rel="0" target="_blank">LinkedIn</a></li>
                </ul>
            </nav>
        </div>
    </section>
</div>

@include('includes.footer')
    
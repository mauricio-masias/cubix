<footer>
<div>
@if($pages['page_footer_year']!= null)
&copy; {{$pages['page_footer_year']}}&nbsp;&nbsp;&nbsp;
@else
&copy; @php echo date('Y');@endphp&nbsp;&nbsp;&nbsp;
@endif
@if($pages['page_footer_phone']!= null)|&nbsp;&nbsp;&nbsp;{{$pages['page_footer_phone']}}&nbsp;&nbsp;&nbsp;
@endif
@if($pages['page_footer_email']!= null)|&nbsp;&nbsp;&nbsp;<a href="mailto:{{$pages['page_footer_email']}}">{{$pages['page_footer_email']}}</a>
@endif
</div>   	
</footer> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/scripts.min.js"></script>
<script type="text/javascript">
var rotaheight = $('.video-background').innerHeight();rotaheight = rotaheight * 2;$('.video-background').innerHeight(rotaheight);
var rotawidth = $('.video-background').innerWidth();rotawidth = rotawidth * 2;$('.video-background').innerWidth(rotawidth);
var topp = rotaheight / 4;
var leff = rotawidth / 4;
$('.video-background').css('top','-'+topp+'px');
$('.video-background').css('left','-'+leff+'px');
$('.video-background').css('bottom','initial');
$('.video-background').css('right','initial');
</script>

@if($pages['page_extra_js_footer']!= null)
{!! $pages['page_extra_js_footer'] !!}
@endif

</body>
</html>

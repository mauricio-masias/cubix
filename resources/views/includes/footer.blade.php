<footer>
<div>
@if($site['page_footer_year']!= null)
&copy; {{$site['page_footer_year']}}&nbsp;&nbsp;&nbsp;
@else
&copy; @php echo date('Y');@endphp&nbsp;&nbsp;&nbsp;
@endif
@if($site['page_footer_phone']!= null)|&nbsp;&nbsp;&nbsp;{{$site['page_footer_phone']}}&nbsp;&nbsp;&nbsp;
@endif
@if($site['page_footer_email']!= null)|&nbsp;&nbsp;&nbsp;<a href="mailto:{{$site['page_footer_email']}}">{{$site['page_footer_email']}}</a>
@endif
</div>   	
</footer> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/scripts.min.js"></script>

@if($site['page_extra_js_footer']!= null)
{!! $site['page_extra_js_footer'] !!}
@endif

@if(!empty($page) && $page['page_extra_js_footer']!= null)
{!! $page['page_extra_js_footer'] !!}
@endif

</body>
</html>

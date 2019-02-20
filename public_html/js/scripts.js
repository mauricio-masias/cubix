function classer(){

   this.uri='http://masias.co.uk/';
   this.swap = 0;
  
}


$.fn.exists = function () {
    return this.length !== 0;
}
//$(".menu_l1").exists()

$.fn.hasAttr = function(name) { 
   return this.attr(name) !== undefined;
};

classer.prototype.IEVersion = function(){
	if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
   		this.ie_version = true;
	}else{
        this.ie_version = false;
    }
}

classer.prototype.swapImages = function(d){
   
  	if(mmb.swap==0){

  		mmb.swap=1;
	   	var ext = (d==1)? '-2x.jpg':'.jpg';

		$('.imgcontainer img').each(function(){
			var src = $(this).attr('src');
			var name = $(this).attr('longdesc');
			var src2x = src.slice(0,-15);
			src2x = src2x + name + ext;
			$(this).attr('src',src2x);
		});
	}
	
}	


classer.prototype.closeAllArticles = function(op){
    $('article').each(function(index, element) {
      
		var opx = index + 1;
		if(opx != op ){$(this).hide();}
    });
	
}

classer.prototype.analyticsBtn = function(btn,info){

	switch(parseInt(btn)){

			case 1: ga('send', 'event', 'Works', 'Click', info); break;
			case 2: ga('send', 'event', 'CV', 'download', 'pdf'); break;
			case 3: ga('send', 'event', 'CV', 'open', 'new window'); break;

	};
	
}

classer.prototype.analyticsMenu = function(device,op){
	
	var device = (parseInt(device) == 1)? 'desktop':'mobile'; 
	
	switch(parseInt(op)){
		case 1: ga('send', 'event', 'Menu '+device, 'Click', 'About me'); break;
		case 2: ga('send', 'event', 'Menu '+device, 'Click', 'Works'); break;
		case 3: ga('send', 'event', 'Menu '+device, 'Click', 'CV'); break;
		case 0: ga('send', 'event', 'Menu '+device, 'Click', 'Linkedin'); break;
	}	
}

classer.prototype.isHighDensity = function(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
}

classer.prototype.isMobileMode = function(){
    return (window.matchMedia('(max-width: 767px)').matches); 
}

classer.prototype.isInViewport = function(){
	var elementTop 		= $(this).offset().top;
	var elementBottom 	= elementTop + $(this).outerHeight();
	var viewportTop 	= $(window).scrollTop();
	var viewportBottom 	= viewportTop + $(window).height();
	return elementBottom > viewportTop && elementTop < viewportBottom;
};

classer.prototype.slideContent = function(option){

	if(!mmb.isMobileMode()){
		$("#op"+option).css("width","50%");
		$("#op"+option).animate( {width:"100%"},500,function(){} );
	}
}

classer.prototype.isiPad = function(){
	return navigator.userAgent.match(/iPad/i) != null;
}

var mmb = new classer();
var player;



$(function() {
	

	window.setTimeout(function(){ 
		$( "li a.about" ).trigger( "click" );
		mmb.slideContent(1,'li a.about');
	}, 100);
	
	//isotopes
	var grid = $('.grid').isotope({
		 isInitLayout: false,
		  itemSelector: '.item',
		  layoutMode: 'fitRows'
		  
	});
	
	$('.showmore').on('click',function(e){
		e.preventDefault();
		$(this).parent().parent().parent().find('.moreinfo').slideToggle(250);
		var text = $(this).html();
		if(text =='+ More'){$(this).html('- Less');}else{$(this).html('+ More');}
	});
	
	
	var filters = {};

	$('.filters').on( 'click', '.button', function() {
	  var $this = $(this);
	  // get group key
	  var buttonGroup = $this.parents('.button-group');
	  var filterGroup = buttonGroup.attr('data-filter-group');
	  // set filter for group
	  filters[ filterGroup ] = $this.attr('data-filter');
	  // combine filters
	  var filterValue = concatValues( filters );
	  // set filter for Isotope
	  grid.isotope({ filter: filterValue });
	});

	// change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
	  var buttonGroup = $( buttonGroup );
	  buttonGroup.on( 'click', 'button', function() {
		buttonGroup.find('.is-checked').removeClass('is-checked');
		$( this ).addClass('is-checked');
	  });
	});
	  
	// flatten object by concatting values
	function concatValues( obj ) {
	  var value = '';
	  for ( var prop in obj ) {
		value += obj[ prop ];
	  }
	  return value;
	}


	//menu
	$('li a').on('click',function(e){
		
		var option = $(this).attr('rel');
		if (parseInt(option) != 0){
			e.preventDefault();

			if(mmb.isHighDensity()){mmb.swapImages(1);
			}else{mmb.swapImages(0);}
	
			$(this).parent().toggleClass('active');
			$(this).parent().siblings().removeClass('active');
			
			$('article#op'+option).toggle(); 
			
			if(option ==1 || option == 3){mmb.slideContent(option);}

			mmb.closeAllArticles(option);
			grid.isotope();
		}
		//capture analytics events desktop
		mmb.analyticsMenu(1,option);
	});
	
	$('.thumb a').on('click',function(e){
		
		var option = $(this).attr('rel');
		if (parseInt(option) != 0){
			
			e.preventDefault();

			if(mmb.isHighDensity()){mmb.swapImages(1);
			}else{mmb.swapImages(0);}

			$(this).parent().toggleClass('active');
			$(this).parent().siblings().removeClass('active');
			
			$('article#op'+option).toggle();
			mmb.closeAllArticles(option);
			grid.isotope();
		}
		//capture analytics events mobile
		mmb.analyticsMenu(2,option);
		
	});

	$('.downloadpdf').on('click',function(){mmb.analyticsBtn(2,0);});

	$('.openpdf').on('click',function(){mmb.analyticsBtn(3,0);});

	$('.imgcontainer').on('click',function(){
		var info = $(this).attr('alt');
		var io = info.split(':');
		mmb.analyticsBtn(1,io[1]);
	});
	
	
	//hash menu opener
	if(window.location.hash) {

        	//Puts hash in variable, and removes the # character	
      		var hash = window.location.hash.substring(1); 
      	    switch(hash){
				
				case 'about':
			
                        if(mmb.isMobileMode()){
                                $( ".thumb a.about" ).trigger( "click" );
                        }else{
                              	$( "li a.about" ).trigger( "click" );
                        }
                        break;

                case 'works':
			
                        if(mmb.isMobileMode()){
                                $( ".thumb a.works" ).trigger( "click" );
                        }else{
                              	$( "li a.works" ).trigger( "click" );
                        }
                        break;

                case 'cv': 

                		if(mmb.isMobileMode()){
                                $( ".thumb a.cv" ).trigger( "click" );
                        }else{
                              	$( "li a.cv" ).trigger( "click" );
                        }
                        break;

                default: //no hash or no significant
                		
                		break;

            }
	}
});


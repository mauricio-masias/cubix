function classer(){

   this.uri='https://cubix.club/';
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

		$('.imgcontainer img')
		.each(function(){
			var src = $(this).attr('src');
			var name = $(this).attr('longdesc');
			var src2x = src.slice(0,-15);
			src2x = src2x + name + ext;
			$(this).attr('src',src2x);
		})
		.promise().done( function(){ 
			$('.grid').masonry({
			  //isInitLayout: false,
			  itemSelector: '.item',
			  //layoutMode: 'fitRows',
			  percentPosition:true,
			  horizontalOrder: true,
			  
			  columnWidth:'.grid-sizer'
			});
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
	
	/*if(mmb.isHighDensity()){mmb.swapImages(1);
	}else{mmb.swapImages(0);}
	*/

	var $grid = $('.grid').imagesLoaded( function() {
	  
	  $grid.masonry({
	    //isInitLayout: false,
				  itemSelector: '.item',
				  //layoutMode: 'fitRows',
				  percentPosition:true,
				  horizontalOrder: true,
				  
				  columnWidth:'.grid-sizer'
	  });
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


$(document).ready(function(){
    console.log('ready to roll front');
});

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


classer.prototype.isiPad = function(){
    return navigator.userAgent.match(/iPad/i) != null;
}

var mmb = new classer();



$(function() {

    if(! mmb.isMobileMode()){
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
    }

});



$(document).ready(function(){

	if($(window).width()> 980){
		//Sun Blinking
		setInterval(function(){

			$('#sun2').delay(1000).fadeIn(300);
			$('#sun3').delay(2000).fadeIn(300);

			$('#sun3').delay(1000).fadeOut(300);
			$('#sun2').delay(2000).fadeOut(300);

		}, 1000);	

		// Clouds Moving
		setInterval(function(){
		    $('#cloud1').animate({
		    	'background-position': '+=5px',
		    },300);
	    }, 1);	

	    setInterval(function(){
		    $('#cloud2').animate({
		    	'background-position': '+=5px',
		    },300);
	    }, 1);
	}


    var vh = $(window).height()/2;

    $(window).scroll(function(){


        if ($(this).scrollTop() > ($("#bag").offset().top-vh-200)) { //240

            $('section.our_product #bag1').css({
            	'top': 0,
            	'opacity': 1,
            	'transition': 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)'
            });
			setTimeout(function(){
				$('section.our_product .seeds').css({
	            	'zoom': 1,
	            	'opacity': 1,
	            	'transition': 'zoom 0.5s ease-out'
	            });
			},600);
            
        } // bag

        if ($(this).scrollTop() > ($("#hand").offset().top-vh-250)) { //100
            $('section.our_partners img').addClass('show_hand');
        }

    }); // scroll  
    
    var w = $(window).width(); 

    $(window).resize(function(){

        if(w < 1001) {
        	$('section.our_partners img').addClass('show_hand');
        } // <1001

        // if(w < 871) {
        // 	$('section.our_partners img').addClass('show_hand');
        // } // <871


    }); // resize
        if(w < 570) {  

    		$(window).scroll(function(){
		        if($(this).scrollTop() > $("header").offset().top+64){
		        	$('header nav').css({
		        		 'position':'fixed',
		        		 'top': 0
		        	});
		        }
		        else{
		        	$('header nav').css({
		        		 // 'top': 63,
		        		 'position':'static',
		        	});	        	
		        }
	    	});		   
        } // 570

            

}); //Doucment Ready

jQuery(document).ready(function ($) {

    //initialise Stellar.js
    $(window).stellar({
  		responsive: true
	});

});
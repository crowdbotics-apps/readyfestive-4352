( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();




jQuery(document).ready(function($) {
	
	
AOS.init({
  disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  duration: 800,
  offset:10,
  once: true, // whether animation should happen only once - while scrolling down
  mirror: false // whether elements should animate out while scrolling past them

});


var $animatedwords = $('.rw-sentence').data('words');
console.log($animatedwords);

	$(".typed").typed({
		strings: ['festive', 'season','joy', 'memories','magic'],
		// Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
		stringsElement: null,
		// typing speed
		typeSpeed: 30,
		// time before typing starts
		startDelay: 1000,
		// backspacing speed
		backSpeed: 20,
		// time before backspacing
		backDelay: 500,
		// loop
		loop: false,
		// false = infinite
		loopCount: 5,
		// show cursor
		showCursor: false,
		// character for cursor
		cursorChar: "",
		// attribute to type (null == text)
		attr: null,
		// either html or text
		contentType: 'html',
		// call when done callback function
		callback: function() {},
		// starting callback function before each string
		preStringTyped: function() {},
		//callback for every typed string
		onStringTyped: function() {},
		// callback for reset
		resetCallback: function() {}
	});





	// toggle bundled item highlight when click add checkbox
   $(".bundled_product_checkbox").change(function () {
        if (this.checked) {
            $(this).closest(".bundled_product").addClass("added");
        }
        else
        {
           $(this).closest(".bundled_product").removeClass("added");
        }
    });
    
    
       
	
	// make child/bundled items unclickable in cart
	$('.cart .bundled_table_item .product-name a, .cart .bundled_table_item .product-thumbnail a').removeAttr('href').css('cursor','default');
    	
		
	// make shop box unclickable if it is out of stock, make subscription page product links unclickable
	$('ul.products li.outofstock a').removeAttr('href').css('cursor','default');
    	
		
	//make table responsive
	$('.entry-content table').wrap('<div style="overflow-x:auto"></div>');
		
		





	
// fittext
//$(".slide-content h1").fitText(1.1, { minFontSize: '30px', maxFontSize: '42px' });
//$(".slide-content h1 em").fitText(1.1, { minFontSize: '48px', maxFontSize: '72px' });
	
	/*
// slick
$('.slider').slick({
	slidesToShow: 1,
  	slidesToScroll: 1,
  	fade: true,
	arrows:false,
	pauseOnHover:false,
	autoplay: true,
  	autoplaySpeed: 4000,
  	speed:1200,
  	mobileFirst:true,
  	responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows:true
      }
    }]
});
*/

$('#bee-featured-products .products, #bee-live-boxes .products').slick({
	slidesToShow: 4,
  	slidesToScroll: 1,
  	slide: 'li',
	infinite: false,
	arrows:true,
  	responsive: [
    {
      breakpoint: 768,
      settings: "unslick"
    }]
});

var $slider = $('.slider')

	.on('init', function(slick) {
		$('.slider').css('visibility','visible');
	})
	.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		arrows:false,
		pauseOnHover:false,
		autoplay: true,
		autoplaySpeed: 6000,
		speed:1200,
		mobileFirst:true,
		responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows:true
		  }
	}]
});


// style select boxes

if (!$('body').hasClass("woocommerce-checkout")) {
	$('.woocommerce select, .widget select, .mc-field-group select, .product select').wrap('<div class="styled-select"></div>');
}

$(document).on( "qv_loader_stop", function() {
 	$('.woocommerce select, .widget select, .mc-field-group select, .product select').wrap('<div class="styled-select"></div>');
});
	

/*
$('.storefront-sorting .orderby').parent().append('<h4 class="widget-title">Default Sorting</h4><ul class="product-categories"></ul>');
$('.storefront-sorting .orderby option').each(function(){
  $('.storefront-sorting .styled-select .product-categories').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
});
$('.storefront-sorting .orderby').remove();
$('.storefront-sorting .styled-select .product-categories').attr('id', 'orderby');
*/


// smooth scroll anchor links
String.prototype.capitalize = function() {
    return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
};
	
function scrollNav() {
  $('#showcase a, .storefront-sorting ul.product-categories a').click(function(){  
   
    //Animate
    $('html, body').stop().animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 0
    }, 700);
    return false;
  });
  
}
scrollNav();
	
//Display subscription totals
function getFinalEntry(){
	return $("input[name=input_38]:checked").val();
}

$("#input_1_38").on('change', function(){
	if( getFinalEntry() == "BUILD YOUR SUBSCRIPTION"){
		$("#gform_totals_1").css("display", "block");
		$("#gform_submit_button_1").css("display", "block");
	} else {
		$("#gform_totals_1").css("display", "none");
		$("#gform_submit_button_1").css("display", "none");
	}
})	
	
if($(".gform_next_button") != undefined  ){
   var value = $(".gf_step_next h6").text();
   console.log(value);	
   $(".gform_next_button").val("Next Step >" );
}

if($(".gform_next_button") != undefined  ){	
  var value = $(".gf_step_previous h6").text();	
  $(".gform_previous_button").val( "< Previous Step" );	
}
	
$(".gf_step").each(function(i, value){
	let that = this;
	if(!$(this).hasClass("gf_step_active")){
	  $(this).on('click', function(){	
	    $("#gform_target_page_number_3").val(i+1);  
	    $("#gform_3").trigger("submit",[true]); 
	  })
	}
	
});	
	
$(".custom-sub-form-buttons").on('click', function(){
	var value = $(this).val();

    //$("input[name='input_38'][value='"+value+"']").prop('checked', true);
	$("input[name='input_38'][value='"+value+"']").trigger("click");
	
})	

});




jQuery(document).ready(function($){

	var expireTimer = eucookielaw_data.expireTimer;
	var scrollConsent = eucookielaw_data.scrollConsent;
	
	$(".eu_control_btn").click(function() {
		document.cookie = "euCookie=set; Max-Age=0; path=/";
		window.location.reload();
	});
	
	$("#fom").click(function() {
		if( $('#fom').attr('href') === '#') { 
			$(".pea_cook_more_info_popover").fadeIn("slow");
			$(".pea_cook_wrapper").fadeOut("fast");
		}
	});
	
	$("#pea_close").click(function() {
		$(".pea_cook_wrapper").fadeIn("fast");
		$(".pea_cook_more_info_popover").fadeOut("slow");
	});
	
	$('#pea_cook_btn, .eucookie').click(function() {
		euCookieConsent();
	});
	
	jQuery(window).scroll(function(){
		if ( scrollConsent > 0 && document.cookie.indexOf("euCookie") < 0 ) {		
			euCookieConsent();
		}	
	});
	
	function euCookieConsent() {
		var expire = new Date();
		expire.setDate(expire.getDate() + expireTimer );
		var utcDate = new Date(expire).toUTCString();
		document.cookie = "euCookie=set; expires=" + utcDate + "; path=/";
		window.location.reload();
	}
});
jQuery(document).ready(function($){
    $('.color-field').wpColorPicker();
	
	$( "#boxcontent" ).prop( "disabled", $('#boxlinkid').val() );
	$( "#closelink" ).prop( "disabled", $('#boxlinkid').val() );
	$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	
	$('#boxlinkid').on('change', function() {
		$( "#boxcontent" ).prop( "disabled", this.value );
		$( "#closelink" ).prop( "disabled", this.value );
	});

	$('#networkshare').on('change', function() {
		$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	});
});
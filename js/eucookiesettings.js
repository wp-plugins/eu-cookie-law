jQuery(document).ready(function($){
    $('.color-field').wpColorPicker();
	
	
	eclshowhide();
	
	$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	
	$('#boxlinkid').on('change', eclshowhide );

	$('#networkshare').on('change', function() {
		$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	});
	
	function eclshowhide() {
		if ($('#boxlinkid').val() == "C") {
			$( "#customurl" ).prop( "disabled", false );
			$( "#boxcontent" ).prop( "disabled", true );
			$( "#closelink" ).prop( "disabled", true );
		} else if ($('#boxlinkid').val()) {
			$( "#customurl" ).prop( "disabled", true );
			$( "#boxcontent" ).prop( "disabled", true );
			$( "#closelink" ).prop( "disabled", true );
		} else {
			$( "#customurl" ).prop( "disabled", true );
			$( "#boxcontent" ).prop( "disabled", false );
			$( "#closelink" ).prop( "disabled", false );
		}
	}
});
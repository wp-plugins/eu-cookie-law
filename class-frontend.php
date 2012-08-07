<?php

function peadig_eucookie_scripts() {
	wp_register_style	('basecss', plugins_url('peadig-eucookie.css', __FILE__), false);
	wp_enqueue_style	('basecss');
	wp_deregister_script('jquery');
	wp_register_script	('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', false, '1.7.2');
	wp_enqueue_script	('jquery');
}
add_action('wp_head', 'peadig_eucookie_scripts');

function peadig_eucookie_bar(){
	$options = get_option('peadig_eucookie');
	if ($options['enabled'] == '1') {
		
		if(!$_COOKIE['peadigCookie']){	
		//for Cookie
		switch($options['length']){
			case "hours":
				$multi = 3600;
				break;
			case "days":
				$multi = 3600 * 24;
				break;
			case "weeks":
				$multi = 3600 * 24 * 7;
				break;
			case "months":
				$multi = 3600 * 24 * 30;
				break;	
		}
		
		$expireTimer = $multi * $options['lengthnum']
?>
        <div class="pea_cook_wrapper pea_cook_<?php if ($options['position']!="") {echo $options['position'];} else {echo "bottomright";} ?>">
            <p><?php echo $options['barmessage']; ?> <a href="#" id="fom"><?php echo $options['barlink']; ?></a> <button id="pea_cook_btn" class="pea_cook_btn" href="#"><?php echo $options['barbutton']; ?></button></p>
        </div>
        <div class="pea_cook_more_info_popover">
            <div class="pea_cook_more_info_popover_inner">
             <p><?php echo $options['boxcontent']; ?></p>
                <p><a href="#" id="pea_close"><?php echo $options['closelink']; ?></a></p>
			</div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                $("#fom").click(function() {
                  $(".pea_cook_more_info_popover").fadeIn("slow");
                  $(".pea_cook_wrapper").fadeOut("fast");
                });
                $("#pea_close").click(function() {
                  $(".pea_cook_wrapper").fadeIn("fast");
                  $(".pea_cook_more_info_popover").fadeOut("slow");
                });
				$('#pea_cook_btn').click(function() {
					var today = new Date();
					var expire = new Date() + <?php echo $expireTimer?>;
                    document.cookie = "peadigCookie=set; expires=" + expire;
				$(".pea_cook_wrapper").fadeOut("fast");
                });
            });
        </script>
<?php
		}
	}
}
add_action('wp_footer', 'peadig_eucookie_bar', 1000);
?>
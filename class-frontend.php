<?php

function peadig_eucookie_scripts() {
	wp_register_style	('basecss', plugins_url('css/style.css', __FILE__), false);
	wp_enqueue_style	('basecss');
}
add_action('wp_head', 'peadig_eucookie_scripts');

function eu_cookie_check() {
    
}

function peadig_eucookie_bar() {
    $options = get_option('peadig_eucookie');
    
	if ( !$options['enabled'] ) {
        return;
    }

		if(!$_COOKIE['peadigCookie']){
		//for Cookie
		switch($options['length']){
			case "hours":
				$multi = (1/24);
				break;
			case "days":
				$multi = 1;
				break;
			case "weeks":
				$multi = 7;
				break;
			case "months":
				$multi = 30;
				break;
		}

		$expireTimer = $multi * $options['lengthnum'];
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
					var expire = new Date();
                    expire.setDate(expire.getDate() + <?php echo $expireTimer?>);
                    document.cookie = "peadigCookie=set; expires=" + expire;
                    window.location.reload();
				$(".pea_cook_wrapper").fadeOut("fast");
                });
            });
        </script>
<?php
	}
}
add_action('wp_footer', 'peadig_eucookie_bar', 1000);

function eu_cookie_shortcode( $atts, $content = null ) {
    if (!$_COOKIE['peadigCookie']) {
        extract(shortcode_atts(
             array(
                 'height' => 'auto',
                 'width' => 'auto',
                 'text' => '<b>Content not available.</b><br><small>Please allow cookies by clicking Accept on the banner</small>',
             ), $atts));
        ob_start();
	   return '<div class="eucookie" style="width:'.$width.';height:'.$height.';
        background:url(\''.plugins_url('img/congruent_pentagon.png',__FILE__).'\') repeat;"><span>'.$text.'</span><!--' . $content . '--></div><div class="clear"></div>';
    }
    return $content;
}
add_shortcode( 'cookie', 'eu_cookie_shortcode' );
<?php

function peadig_eucookie_scripts() {
	wp_register_style	('basecss', plugins_url('css/style.css', __FILE__), false);
	wp_enqueue_style	('basecss');
    wp_enqueue_script   ('jquery');
}
add_action('wp_head', 'peadig_eucookie_scripts');

function cookie_accepted() {
    
    if ( ! eucookie_option('enabled') ) { return true; }
    
    return isset( $_COOKIE['euCookie'] );
}

function eucookie_option($name) {
    $options = get_option('peadig_eucookie');
    if ( isset( $options[$name] ) ) { return $options[$name]; }
    return false;
}

function get_expire_timer() {
    
    switch( eucookie_option('length') ){
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
    return $multi *  eucookie_option('lengthnum');
}
    
function peadig_eucookie_bar() {
    $options = get_option('peadig_eucookie');
    
	if ( cookie_accepted() ) {
        return;
    }
            
    if ( $options['boxlinkid'] ) {
        $link = get_permalink($options['boxlinkid']);
    } else {
        $link = '#';
    }
?>
        <div
            class="pea_cook_wrapper pea_cook_<?php echo $options['position']; ?>"
            style="
                color:<?php echo ecl_frontstyle('fontcolor'); ?>;
                background-color: rgba(<?php echo ecl_frontstyle('backgroundcolor'); ?>,0.85);
            ">
            <p><?php echo $options['barmessage']; ?> <a style="color:<?php echo $options['fontcolor']; ?>;" href="<?php echo $link; ?>" id="fom"><?php echo $options['barlink']; ?></a> <button id="pea_cook_btn" class="pea_cook_btn" href="#"><?php echo $options['barbutton']; ?></button></p>
        </div>
        <div class="pea_cook_more_info_popover">
            <div
                 class="pea_cook_more_info_popover_inner"
                 style="
                    color:<?php echo ecl_frontstyle('fontcolor'); ?>;
                    background-color: rgba(<?php echo ecl_frontstyle('backgroundcolor'); ?>,0.9);
                    ">
             <p><?php echo $options['boxcontent']; ?></p>
                <p><a style="color:<?php echo $options['fontcolor']; ?>;" href="#" id="pea_close"><?php echo $options['closelink']; ?></a></p>
			</div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                <?php if ( $link == '#') { ?>
                $("#fom").click(function() {
                  $(".pea_cook_more_info_popover").fadeIn("slow");
                  $(".pea_cook_wrapper").fadeOut("fast");
                });
                <?php } ?>
                $("#pea_close").click(function() {
                  $(".pea_cook_wrapper").fadeIn("fast");
                  $(".pea_cook_more_info_popover").fadeOut("slow");
                });
				$('#pea_cook_btn').click(function() {
					var expire = new Date();
                    expire.setDate(expire.getDate() + <?php echo get_expire_timer(); ?>);
                    var utcDate = new Date(expire).toUTCString();
                    document.cookie = "euCookie=set; expires=" + utcDate + "; path=/";
                    window.location.reload();                    
                    
				$(".pea_cook_wrapper").fadeOut("fast");
                });
            });
        </script>
<?php
}
add_action('wp_footer', 'peadig_eucookie_bar', 1000);

function generate_cookie_notice_text($height, $width, $text) {
    return '<div class="eucookie" style="color:'.ecl_frontstyle('fontcolor').'; background-color: rgba('.ecl_frontstyle('backgroundcolor').',0.85);width:'.$width.';height:'.$height.';"><span>'.$text.'</span></div><div class="clear"></div>';    
}

function generate_cookie_notice($height, $width) {
    $options = get_option('peadig_eucookie');
    return generate_cookie_notice_text($height, $width, $options['bhtmlcontent']);
}
function eu_cookie_shortcode( $atts, $content = null ) {
    $options = get_option('peadig_eucookie');
    extract(shortcode_atts(
        array(
            'height' => '',
            'width' => '',
            'text' => $options['bhtmlcontent']
        ),
        $atts)
    );
    if ( cookie_accepted() ) {
        return do_shortcode( $content );
    } else {
        if (!$width) { $width = pulisci($content,'width='); }
        if (!$height) { $height = pulisci($content,'height='); }
        return generate_cookie_notice($height, $width);
    }
}
add_shortcode( 'cookie', 'eu_cookie_shortcode' );

add_filter( 'the_content', 'ecl_erase', 11);
add_filter( 'widget_display_callback','ecl_erase', 11, 3 );
function ecl_erase($content) {
    $options = get_option('peadig_eucookie');
    if ( !cookie_accepted() && eucookie_option('autoblock') ) {
        return preg_replace('#<iframe.*?\/iframe>|<embed.*?>|<script.*?\/script>#is', generate_cookie_notice('auto', '100%'), $content);
    }
    return $content;
}

add_filter( 'widget_text', 'do_shortcode');

function pulisci($content,$ricerca){
	$caratteri = strlen($ricerca)+6;
	$stringa = substr($content, strpos($content, $ricerca), $caratteri);
	$stringa = str_replace($ricerca, '', $stringa);
	$stringa = trim(str_replace('"', '', $stringa));
	return $stringa;
}

function ecl_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function ecl_frontstyle($name) {
    switch ($name) {
    case 'fontcolor':
        return  eucookie_option('fontcolor');
        break;
    case 'backgroundcolor':
        $backgroundcolors = ecl_hex2rgb( eucookie_option('backgroundcolor') );
        return $backgroundcolors[0].','.$backgroundcolors[1].','.$backgroundcolors[2];
        break;
    }
}

function eu_cookie_control_shortcode( $atts ) {
    if ( !eucookie_option('enabled') ) { return; }
    if ( cookie_accepted() ) {
        return '
            <div class="pea_cook_control" style="color:'.ecl_frontstyle('fontcolor').'; background-color: rgba('.ecl_frontstyle('backgroundcolor').',0.9);">
                '.__('Cookies are enabled', 'eu-cookie-law').'
                <button id="eu_revoke_cookies" class="eu_control_btn" href="#">'.__('Revoke cookie consent', 'eu-cookie-law').'</button>
            </div>
            <script type="text/javascript">
            jQuery(document).ready(function($){
				$(".eu_control_btn").click(function() {
                    document.cookie = "euCookie=set; Max-Age=0; path=/";
                    window.location.reload();                    
				$(".pea_cook_wrapper").fadeIn("fast");
                });
            });
        </script>';
    } else {
        return '
            <div class="pea_cook_control" style="color:'.ecl_frontstyle('fontcolor').'; background-color: rgba('.ecl_frontstyle('backgroundcolor').',0.9);">
                '.__('Cookies are disabled', 'eu-cookie-law').'<br>'.sprintf( __( 'Accept Cookies by clicking "%s" in the banner.', 'eu-cookie-law' ), '<b>'.eucookie_option('barbutton').'</b>' ).'
            </div>';            
    }
}
add_shortcode( 'cookie-control', 'eu_cookie_control_shortcode' );
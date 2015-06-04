<?php

add_action('admin_init', 'peadig_eucookie_init' );
function peadig_eucookie_init(){
	register_setting( 'peadig_eucookie_options', 'peadig_eucookie' );
}
 	
add_action('admin_menu', 'show_peadig_eucookie_options');
function show_peadig_eucookie_options() {
	add_options_page('EU Cookie Law', 'EU Cookie Law', 'manage_options', 'peadig_eucookie', 'peadig_eucookie_options');
}


function pea_cook_defaults()
{
	update_option('peadig_eucookie', array	(
        'enabled' 		=> '1',
		'lengthnum' 	=> '1',
		'length'    	=> 'months',
		'position'  	=> 'bottomright',
		'barmessage'	=> 'By continuing to use the site, you agree to the use of cookies.',
		'barlink'    	=> 'more information',
		'barbutton'   	=> 'Accept',
		'closelink'    	=> 'Close',
		'boxcontent'    => 'The cookie settings on this website are set to "allow cookies" to give you the best browsing experience possible. If you continue to use this website without changing your cookie settings or you click "Accept" below then you are consenting to this.',
        'bhtmlcontent'  => '<b>Content not available.</b><br><small>Please allow cookies by clicking Accept on the banner</small>'
        )
    );	
}


// ADMIN PAGE
function peadig_eucookie_options() {
?>
	<div class="wrap">
		<h2>EU Cookie Law <?php echo get_option( 'ecl_version_number' ); ?> &bull; Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('peadig_eucookie_options'); ?>
			<?php $options = get_option('peadig_eucookie'); ?>
			<h3 class="title">Main Settings</h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="enabled">Enabled</label></th>
					<td><input id="enabled" name="peadig_eucookie[enabled]" type="checkbox" value="1" <?php checked('1', $options['enabled']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="lengthnum">Acceptance Cookie Length</label></th>
					<td><input id="lengthnum" type="text" name="peadig_eucookie[lengthnum]" value="<?php echo $options['lengthnum']; ?>" size="5" /> 
						<select name="peadig_eucookie[length]">
							  <option value="hours"<?php if ($options['length'] == 'hours') { echo ' selected="selected"'; } ?>>hours</option>
							  <option value="days"<?php if ($options['length'] == 'days') { echo ' selected="selected"'; } ?>>days</option>
							  <option value="weeks"<?php if ($options['length'] == 'weeks') { echo ' selected="selected"'; } ?>>weeks</option>
							  <option value="months"<?php if ($options['length'] == 'months') { echo ' selected="selected"'; } ?>>months</option>
						</select><br />
<small>Once the user clicks accept the bar will disappear. You can set how long this will apply for before the bar reappears to the user.</small>
					</td>
				</tr>
			</table>
        <hr>
			<h3 class="title">Appearance</h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="position">Position</label></th>
					<td>
						<select name="peadig_eucookie[position]">
							  <option value="bottomright"<?php if ($options['position'] == 'bottomright') { echo ' selected="selected"'; } ?>>Bottom Right</option>
							  <option value="topright"<?php if ($options['position'] == 'topright') { echo ' selected="selected"'; } ?>>Top Right</option>
							  <option value="bottomleft"<?php if ($options['position'] == 'bottomleft') { echo ' selected="selected"'; } ?>>Bottom Left</option>
							  <option value="topleft"<?php if ($options['position'] == 'topleft') { echo ' selected="selected"'; } ?>>Top Left</option>
						</select>
					</td>
				</tr>
			</table>
        <hr>
			<h3 class="title">Content Settings</h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="barmessage">Warning Bar Message Text</label></th>
					<td><input id="barmessage" type="text" name="peadig_eucookie[barmessage]" value="<?php echo $options['barmessage']; ?>" size="100" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barlink">Wording for link to find out more info</label></th>
					<td><input id="barlink" type="text" name="peadig_eucookie[barlink]" value="<?php echo $options['barlink']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barbutton">Accept Button Text</label></th>
					<td><input id="barbutton" type="text" name="peadig_eucookie[barbutton]" value="<?php echo $options['barbutton']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barbutton">"Close Popup" Text</label></th>
					<td><input id="closelink" type="text" name="peadig_eucookie[closelink]" value="<?php echo $options['closelink']; ?>" /></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="boxlinkid">Bar Link<br/><small>Use this field if you want to link a page instead of showing the popup</small></label></th>
                    <td>
                    <?php $args = array(
                        'depth'                 => 0,
                        'child_of'              => 0,
                        'selected'              => $options['boxlinkid'],
                        'echo'                  => 1,
                        'name'                  => 'peadig_eucookie[boxlinkid]',
                        'id'                    => 'boxlinkid', 
                        'show_option_none'      => 'none', 
                        'show_option_no_change' => null, 
                        'option_none_value'     => null, 
                    ); ?>

                    <?php wp_dropdown_pages($args); ?>
                    </td>
				</tr>
				<tr valign="top"><th scope="row"><label for="boxcontent">Popup Box Content<br/><small>Use this to inform your users about your cookie policy</small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[boxcontent]' id='boxcontent' rows='9' ><?php echo $options['boxcontent']; ?></textarea>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="bhtmlcontent">Blocked code message<br/><small>This is the message that will be displayed for locked-code areas</small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[bhtmlcontent]' id='bhtmlcontent' rows='9' ><?php echo $options['bhtmlcontent']; ?></textarea>
					</td>
				</tr>
			</table>
            </table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
?>
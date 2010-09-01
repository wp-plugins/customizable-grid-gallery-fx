<?php
/*
Plugin Name: Customizable Grid Gallery FX
Plugin URI: http://www.flashxml.net/customizable-grid-gallery.html
Description: An original "Customizable Grid Gallery". Completely XML customizable, without using Flash. And it's free!
Version: 0.2.0
Author: FlashXML.net
Author URI: http://www.flashxml.net/
License: GPL2
*/

/* start client side functions */
	function customizablegridgalleryfx_get_embed_code($customizablegridgalleryfx_attributes) {
		$width = (int)$dockgalleryfx_attributes[1];
		$height = (int)$dockgalleryfx_attributes[2];

		if ($width == 0 || $height == 0) {
			return '';
		}

		$plugin_dir = get_option('customizablegridgalleryfx_path');
		if ($plugin_dir === false) {
			$plugin_dir = 'flashxml/customizable-grid-gallery-fx';
		}
		$plugin_dir = trim($plugin_dir, '/');

		$swf_embed = array(
			'width' => $width,
			'height' => $height,
			'text' => trim($customizablegridgalleryfx_attributes[3]),
			'gallery_path' => WP_CONTENT_URL . "/{$plugin_dir}/",
			'swf_name' => 'CustomizableGridGallery.swf',
		);
		$swf_embed['swf_path'] = $swf_embed['gallery_path'].$swf_embed['swf_name'];

		if (!is_feed()) {
			$embed_code = '<div id="customizablegridgallery-fx">'.$swf_embed['text'].'</div>';
			$embed_code .= '<script type="text/javascript">';
			$embed_code .= "swfobject.embedSWF('{$swf_embed['swf_path']}', 'customizablegridgallery-fx', '{$swf_embed['width']}', '{$swf_embed['height']}', '9.0.0.0', '', { folderPath: '{$swf_embed['gallery_path']}' }, { scale: 'noscale', salign: 'tl', wmode: 'transparent', allowScriptAccess: 'sameDomain', allowFullScreen: true }, {});";
			$embed_code.= '</script>';
		} else {
			$embed_code = '<object width="'.$swf_embed['width'].'" height="'.$swf_embed['height'].'">';
			$embed_code .= '<param name="movie" value="'.$swf_embed['swf_path'].'"></param>';
			$embed_code .= '<param name="scale" value="noscale"></param>';
			$embed_code .= '<param name="salign" value="tl"></param>';
			$embed_code .= '<param name="wmode" value="transparent"></param>';
			$embed_code .= '<param name="allowScriptAccess" value="sameDomain"></param>';
			$embed_code .= '<param name="allowFullScreen" value="true"></param>';
			$embed_code .= '<param name="sameDomain" value="true"></param>';
			$embed_code .= '<param name="flashvars" value="folderPath='.$swf_embed['gallery_path'].'"></param>';
			$embed_code .= '<embed type="application/x-shockwave-flash" width="'.$swf_embed['width'].'" height="'.$swf_embed['height'].'" src="'.$swf_embed['swf_path'].'" scale="noscale" salign="tl" wmode="transparent" allowScriptAccess="sameDomain" allowFullScreen="true" flashvars="folderPath='.$swf_embed['gallery_path'].'"';
			$embed_code .= '></embed>';
			$embed_code .= '</object>';
		}

		return $embed_code;
	}

	function customizablegridgalleryfx_filter_content($content) {
		return preg_replace_callback('|\[customizable-grid-gallery-fx\s*width\s*=\s*"(\d+)"\s+height\s*=\s*"(\d+)"\s*\](.*)\[/customizable-grid-gallery-fx\]|i', 'customizablegridgalleryfx_get_embed_code', $content);
	}

	function customizablegridgalleryfx_echo_embed_code($width, $height, $div_text = '') {
		echo customizablegridgalleryfx_get_embed_code(array(1 => $width, 2 => $height, 3 => $div_text));
	}

	function customizablegridgalleryfx_load_swfobject_lib() {
		wp_enqueue_script('swfobject');
	}
/* end client side functions */

/* start admin section functions */
	function customizablegridgalleryfx_admin_menu() {
		add_options_page('Customizable Grid Gallery FX Options', 'Customizable Grid Gallery FX', 'manage_options', 'customizablegridgalleryfx', 'customizablegridgalleryfx_admin_options');
	}

	function customizablegridgalleryfx_admin_options() {
	  if (!current_user_can('manage_options'))  {
				wp_die(__('You do not have sufficient permissions to access this page.'));
		}

	  $customizablegridgalleryfx_default_path = get_option('customizablegridgalleryfx_path');
	  if ($customizablegridgalleryfx_default_path === false) {
	  	$customizablegridgalleryfx_default_path = 'flashxml/customizable-grid-gallery-fx';
	  }
?>
<div class="wrap">
	<h2>Customizable Grid Gallery FX</h2>
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row" style="width: 40em;">SWF and assets path is <?php echo WP_CONTENT_DIR; ?>/</th>
				<td><input type="text" style="width: 25em;" name="customizablegridgalleryfx_path" value="<?php echo $customizablegridgalleryfx_default_path; ?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="customizablegridgalleryfx_path" />
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
<?php
	}
/* end admin section functions */

/* start hooks */
	add_filter('the_content', 'customizablegridgalleryfx_filter_content');
	add_action('init', 'customizablegridgalleryfx_load_swfobject_lib');
	add_action('admin_menu', 'customizablegridgalleryfx_admin_menu');
/* end hooks */

?>
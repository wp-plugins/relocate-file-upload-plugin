<?php
/*
Plugin Name: Relocate File Upload
Plugin URI: http://www.codehooligans.com
Description: This plugin will move the File Upload section on the Posts and Pages edit page. The File Upload section will be converted to a collapsable box similar toÊthe Post Excerpt and Custom Fields items.
Version: 1.0
Author: Paul Menard
Author URI: http://www.codehooligans.com
*/
function move_file_upload()
{
	?>
	<script language="JavaScript">
	function move_WP_image_upload()
	{
		var file_upload_ref = document.getElementById("uploading");
		if (!file_upload_ref)
			return;
		var advanced_stuff_ref = document.getElementById("fileuploadboxstuff");
		if (!advanced_stuff_ref)
			return;
		
		advanced_stuff_ref.appendChild(file_upload_ref);
		
		//advanced_stuff_ref.appendChild ('<div class="dbx-b-ox-wrapper"><fieldset id="postcustom" class="dbx-box">'+file_upload_ref+'</fieldset></div>');
//		var new_fu_div = document.createElement('div');
//		new_fu_div.className = "dbx-b-ox-wrapper";
//		var new_fu_fieldset = document.createElement('fieldset');
//		new_fu_fieldset.className = "dbx-box";
//		new_fu_fieldset.appendChild(file_upload_ref);
//		advanced_stuff_ref.appendChild (new_fu_div);
				
	}
	addLoadEvent(move_WP_image_upload);
	</script>
	<?php
}

function add_upload_dbx_item()
{
	?>
	<div class="dbx-b-ox-wrapper">
		<fieldset id="postcustom" class="dbx-box">
			<div class="dbx-h-andle-wrapper">
				<h3 class="dbx-handle"><?php _e('File Uploads') ?></h3>
			</div>
			<div class="dbx-c-ontent-wrapper">
				<div id="fileuploadboxstuff" class="dbx-content">
				</div>
			</div>
		</fieldset>
	</div>
	
	<?php
}

if (function_exists('add_action')) 
{
	// Hook into the Plugin API
	add_action('admin_head', 'move_file_upload');
	add_action('dbx_post_advanced', 'add_upload_dbx_item');
	add_action('dbx_page_advanced', 'add_upload_dbx_item');
}
?>
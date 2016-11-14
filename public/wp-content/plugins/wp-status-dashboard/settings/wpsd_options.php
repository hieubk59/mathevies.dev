<?php global $pluginPath,$shortname; ?>

<link rel="stylesheet" type="text/css" href="<?php echo $pluginPath; ?>settings/css/styles.css" />

<div class="wpsd-header">

	<h2>WP Status Dashboard Settings</h2>
	<a href="http://scheetzdesigns.ticksy.com" class="wpsd-supportLink">Need Help?</a>

</div>

<div class="wpsd-optionsBlock">

	<?php
	
	// save options to database (on submit)
	if (isset($_POST['save_theme_options'])) :
		foreach ($options as $value) {     
			if ($value['id'] == $shortname.'cat_setting'){
				$categories = get_categories('hide_empty=0'); 
				foreach ($categories as $cat) {
						
					$variable_name = $value['id']."_".$cat->cat_ID;
					update_option($variable_name, $_POST[$variable_name]);
					
				}
			}
			update_option($value['id'], $_POST[$value['id']]);
		}
		echo '<div id="message"><p class="updated fade"><strong>Updated Successfully</strong></p></div>';
	endif;
	
	// call function to print options for current page
	wpsd_listOptions($options);
	
	?>
	
</div>
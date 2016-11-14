<?php 
#==================================================================
#
#	Functions used to load and display the theme options
#
#==================================================================


// -----------------------------------------------------------------
// -- Get theme variables, default action is echo 
// -----------------------------------------------------------------

//	$option = the option name in the database (without $wpsd_shortname)
// 	$echo = print the return value (true, false). Default: true
// 	$default = value returned is no value exists in database

function wpsd_theme_var($option, $act = 'echo', $default = '') {
	global $wpsd_shortname;

	if ($default !== '') {
		$theme_option = get_option($wpsd_shortname.$option, $default);
	} else {
		$theme_option = get_option($wpsd_shortname.$option);
	}
	
	switch ($act){
		case "return":
			return $theme_option;
			break;
		default:
			echo $theme_option;
			break;
	}
}


// -----------------------------------------------------------------
// -- Shortcut for options without echo 
// -----------------------------------------------------------------

function wpsd_get_theme_var($option, $default = '') {
	return wpsd_theme_var($option, 'return', $default);
}


// -----------------------------------------------------------------
// -- Get Indexable Status
// -----------------------------------------------------------------
function wpsd_indexable_status() {
	if ('0' == get_option('blog_public') ) {
  		$status = "false";
  		return $status;
  	} else {
  		$status = "true";
  		return $status;
  	}
}

#-----------------------------------------------------------------
# Print options - Gets and runs function for each option type
#-----------------------------------------------------------------

function wpsd_listOptions($options) {	
	echo '<form method="post" action="">';
		// load the function type for this option
		foreach ($options as $value) { 
			if (function_exists('wpsd_options_'.$value['format'])) {
				// calls the specific function (i.e., options_start($value) )
				call_user_func('wpsd_options_'.$value['format'], $value);
			}
		}
		echo '<div class="wpsd-saveStrip bottom">';
			echo '<input type="submit" name="save_theme_options" onclick="saveMenu();" class="wpsd-saveButton" value="Save Changes" />';
		echo '</div>';
	echo '</form>';
}


#-----------------------------------------------------------------
# Option type functions
#-----------------------------------------------------------------

// start (begins the table and adds section title)
//................................................................
function wpsd_options_start($value) {
	echo '<div class="wpsd-saveStrip top">';
		echo '<h2>'. $value['title'] .'</h2>';
		echo '<input type="submit" name="save_theme_options" onclick="saveMenu();" class="wpsd-saveButton" value="Save Changes" />';
	echo '</div>';
	echo '<div class="wpsd-options">';
}

// start (begins the table and adds section title)
//................................................................
function wpsd_options_section($value) {
	if (!isset($value['ifUsername']) || isset($value['ifUsername']) && get_theme_var('envatoUsername')) {
		echo '<div class="wpsd-section">';
			echo '<h2>'. $value['title'] .'</h2>';
		echo '</div>';
	}
}

// end (closes the table)
//................................................................
function wpsd_options_end($value) {
	echo '</div>';
}

// title (prints the options page title)
//................................................................
function wpsd_options_title($value) {
	echo '<h3>'. $value['name'] .'</h3>';
}

// select (drop down list)
//................................................................
function wpsd_options_select($value) {
	echo '<h4>'. $value['name'] .'</h4>';
	echo '<span class="description">'. $value['desc'] .'</span>';
	echo '<div class="wpsd-sectionBlock">';
	echo '<label>'. $value['label'] .'</label>';
	echo '<select style="width:350px;" name="'. $value['id'] .'" id="'. $value['id'] .'" onchange="checkForCustom(this, \''. $value['id'] .'_customOption\');">';
	echo '<option value="">Choose one...</option>';
	
	foreach ($value['options'] as $key=>$option) { 
		echo '<option value="'. $key .'"'; 
			if ( get_option( $value['id'] ) == $option || get_option( $value['id'] ) == $key) { 
				echo ' selected="selected"'; 
			} elseif  ( !get_option( $value['id']) && $key == $value['default'] ) {
				echo ' selected="selected"'; 
			}
		echo '>'. $option .'</option>';
	}
			
	echo '</select>';
	echo '</div>';
}

// multiselect
//................................................................
function wpsd_options_multiselect($value) {
	echo '<h4>'. $value['name'] .'</h4>';
	echo '<span class="description">'. $value['desc'] .'</span>';
	echo '<div class="wpsd-sectionBlock">';
	echo '<label>'. $value['label'] .'</label>';
	echo '<select style="width:350px; height:100px" name="'. $value['id'] .'[]" id="'. $value['id'] .'" multiple="multiple">';
	
	foreach ($value['options'] as $key=>$option) { 
		echo '<option value="'. $key .'"'; 
			if ( is_array(get_option($value['id'])) ) {
				if ( in_array($key, get_option($value['id'])) ) { 
					echo ' selected="selected"'; 
				}
			}
		echo '>'. $option .'</option>';
	}
			
	echo '</select>';
	echo '</div>';
}

// text (displays a text input)
//................................................................
function wpsd_options_text($value) {
	echo '<h4>'. $value['name'] .'</h4>';
	echo '<span class="description">'. $value['desc'] .'</span>';
	echo '<div class="wpsd-sectionBlock">';
	echo '<label>'. $value['label'] .'</label>';
	echo '<input class="textbox'; if (isset($value['size'])){ echo ' '.$value['size']; } echo '" name="'. $value['id'] .'" id="'. $value['id'] .'" type="'. $value['format'] .'" value="';
		if ( get_option( $value['id'] ) != "") { 
			echo stripslashes(get_option( $value['id'] )); 
		} else { 
			echo $value['default']; 
		}
	echo '" /></div>';
}

// textarea (displays a textarea)
//................................................................
function wpsd_options_textarea($value) {
	echo '<h4>'. $value['name'] .'</h4>';
	echo '<span class="description">'. $value['desc'] .'</span>';
	echo '<div class="wpsd-sectionBlock">';
	echo '<label>'. $value['label'] .'</label>';
	echo '<textarea class="textarea" cols="" rows="" name="'. $value['id'] .'" type="'. $value['format'] .'">';
		if ( get_option( $value['id'] ) != "") { 
			echo stripslashes(get_option( $value['id'] )); 
		} else { 
			echo $value['default']; 
		}
	echo '</textarea></div>';
}

// checkbox (adds a checkbox input)
//................................................................
function wpsd_options_checkbox($value) {
	if ( get_option($value['id'],'No Value') != 'No Value' && get_option($value['id']) == true ) {
		$checked = 'checked="checked"'; 
	} elseif ( get_option($value['id'],'No Value') == 'No Value' && $value['default'] == true) { 
		$checked = 'checked="checked"'; 
	} else {
		$checked = ''; 
	}
	
	if (isset($value['name']) && $value['name']) { echo '<h4>'. $value['name'] .'</h4>'; }
	if (isset($value['desc']) && $value['desc']) { echo '<span class="description">'. $value['desc'] .'</span>'; }
	echo '<div class="wpsd-sectionBlock">';
	echo '<label>';
	echo '<input type="checkbox" name="'. $value['id'] .'" id="'. $value['id'] .'" value="';
	if (isset($value['value']) && $value['value']){ echo $value['value']; } else { echo 'true'; }
	echo '" '. $checked .' />&nbsp;';
	echo $value['label'] .'</label>';
	echo '</div>';
	
}

// radio (adds a radio series input)
//................................................................
function wpsd_options_radio($value) {
	echo '<h4>'. $value['name'] .'</h4>';
	echo '<span class="description">'. $value['desc'] .'</span>';
	
	echo '<div class="wpsd-sectionBlock">';
		
		echo '<div class="wpsd-radioButtons">';
		
		foreach ($value['options'] as $key=>$option) { 
		
			$checked = '';
			if ( get_option($value['id'],'No Value') != 'No Value' && $key == get_settings($value['id']) ){
				$checked = ' checked="checked"';
			} elseif (isset($value['default']) && $key == $value['default']) {
				$checked = ' checked="checked"';
			}
			
			echo '<label><input type="radio" name="'. $value['id'] .'" value="'. $key .'" '. $checked .' />';
			echo '&nbsp;'. $option . ' &nbsp; '. $value['label'] .'</label><br />';
		}
		
		echo '</div>';
		
	echo '</div>';
	
}
?>
<?php

$options = array (
			
	array(	"format" => "start",
			"title" => "General Settings"),
			
		array(	"format" => "section",
				"title" => "Security Key"),
			
			array(	"name" => "Enter your Security Key",
					"desc" => "If you decided to use the optional security key on your WP Status Dashboard, you'll need to enter that same key here for this WordPress site to allow data to be sent.",
					"id" => $wpsd_shortname."securityKey",
					"default" => "",
					"size" => "large",
					"format" => "text"),	

	array(	"format" => "end")
	
);

?>
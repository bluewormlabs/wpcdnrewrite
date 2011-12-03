<?php
/*
Plugin Name: WP CDN Rewrite
Plugin URI: http://github.com/bluewormlabs
Version: 1.0
Description: 
Author: Blue Worm Labs, LLC
Author URI: http://bluewormlabs.com
License: zlib

Copyright (c) 2011 Blue Worm Labs, LLC

This software is provided 'as-is', without any express or implied
warranty. In no event will the authors be held liable for any damages
arising from the use of this software.

Permission is granted to anyone to use this software for any purpose,
including commercial applications, and to alter it and redistribute it
freely, subject to the following restrictions:

   1. The origin of this software must not be misrepresented; you must not
   claim that you wrote the original software. If you use this software
   in a product, an acknowledgment in the product documentation would be
   appreciated but is not required.

   2. Altered source versions must be plainly marked as such, and must not be
   misrepresented as being the original software.

   3. This notice may not be removed or altered from any source
   distribution.
*/

class WP_CDN_Rewrite {
	const NAME = 'WP CDN Rewrite';
	const SLUG = 'wpcdnrewrite';
	const REQUIREDCAPABILITY = 'read'; // 'manage_options';
	
	function WP_CDN_Rewrite() {
		$this->__construct();
	}
	function __construct() {
		add_action('admin_init', array($this, 'admin_init'));
	}
	
	function admin_init() {
		add_options_page(self::NAME, self::NAME, self::REQUIREDCAPABILITY, self::SLUG, array($this, 'show_config'));
	}
	
	function show_config() {
		$filename = 'html/error.php';
		
		if (current_user_can(self::REQUIREDCAPABILITY)) {
			$filename = 'html/config.php';
		}
		else {
			$filename = 'html/permission_denied.php';
		}
		
		$content = '';
		ob_start();
		require_once($filename);
		$content = ob_get_contents();
		ob_end_clean();
		echo $content;

	}
}

new WP_CDN_Rewrite();

?>
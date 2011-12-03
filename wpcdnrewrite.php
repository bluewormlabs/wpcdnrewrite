<?php
/*
Plugin Name: CDN Rewrite
Plugin URI: http://github.com/bluewormlabs
Version: 1.0
Description: 
Author: Blue Worm Labs
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

new WP_CDN_Rewrite();

class WP_CDN_Rewrite {
	const NAME = 'CDN Rewrite';
	const SLUG = 'wpcdnrewrite';
	const REQUIREDCAPABILITY = 'read'; // 'manage_options';
	
	public function WP_CDN_Rewrite() {
		$this->__construct();
	}

	public function __construct() {
		add_action('admin_init', array($this, 'admin_init'));
	}
	
	public function admin_init() {
		add_options_page(self::NAME, self::NAME, self::REQUIREDCAPABILITY, self::SLUG, array($this, 'show_config'));
	}
	
	public function show_config() {
		if (!current_user_can(self::REQUIREDCAPABILITY)) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		
		$content = '';
		ob_start();
		require_once('html/config.php');
		$content = ob_get_contents();
		ob_end_clean();
		echo $content;
	}
}
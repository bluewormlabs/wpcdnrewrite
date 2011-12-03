<?php
/*
Plugin Name: CDN Rewrite
Plugin URI: http://github.com/bluewormlabs
Version: 1.0
Description: Rewrites URLs to files matching user-specified rules. This allows, for example, static content (e.g., images) to be loaded from a CDN instead of the server running the WordPress install.
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

class WP_CDN_Rewrite {
	const NAME = 'CDN Rewrite'; // displayed name
	const SLUG = 'wpcdnrewrite'; // slug for the options page
	const REQUIRED_CAPABILITY = 'manage_options'; // capability required to edit configuration
	const VERSIONSKEY = 'wpcdnrewrite-version'; // WP options key for our version
	const RULESKEY = 'wpcdnrewrite-rules'; // WP options key for rules

	public function __construct() {
        add_action('admin_menu', array($this, 'admin_init'));
	}
	
	public function admin_init() {
		add_options_page(self::NAME, self::NAME, self::REQUIRED_CAPABILITY, self::SLUG, array($this, 'show_config'));
	}
	
	public function show_config() {
		if (!current_user_can(self::REQUIRED_CAPABILITY)) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}

		require_once('html/config.php');
	}
	
	public function add_rewrite_rules() {
		// option name: 'wpcdnrewrite-version"
		// 		'1.0'
		// option name: 'wpcdnrewrite-rules'
		// 		array(
		// 			array('type' => REWRITE_TYPE_HOST_ONLY | REWRITE_TYPE_FULL_URL,
		// 				  'match' => 'jpg',
		// 				  'rule' => 'http://cdn.myhost.com/images/jpeg/'),
		// 		)
	}
}

new WP_CDN_Rewrite();
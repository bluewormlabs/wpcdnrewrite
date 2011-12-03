<?php
/*
Plugin Name: WP CDN Rewrite
Plugin URI: http://github.com/bluewormlabs
Version: 1.0
Description: 
Author: Blue Worm Labs, LLC
Author URI: http://bluewormlabs.com
License: zlib
*/
/*
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

function wpcdnrewrite_add_admin_menu() {
	$title = 'WP CDN Rewrite';
	$slug = 'wpcdnrewrite';
	
	add_options_page($title, $title, 'manage_options', $slug, 'wpcdnrewrite_admin_menu');
}

function wpcdnrewrite_admin_menu() {
?>
<!-- TODO: Add the admin page -->
<?
}

add_action('admin_menu', 'wpcdnrewrite_add_admin_menu');

?>
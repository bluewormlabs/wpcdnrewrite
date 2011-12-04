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

function cdnrewrite_output_type_selector($selectedValue = null) {
    $optionArray = array(
        WP_CDN_Rewrite::REWRITE_TYPE_FULL_URL => array(
            'selected' => false,
            'outputValue' => 'Rewrite Full URL',
        ),
        WP_CDN_Rewrite::REWRITE_TYPE_HOST_ONLY => array(
            'selected' => false,
            'outputValue' => 'Rewrite Host Only',
        ),
    );

    if(! is_null($selectedValue) && isset($optionArray[$selectedValue])) {
        $optionArray[$selectedValue] = true;
    }

    $output = "<select name=" . WP_CDN_Rewrite::RULES_KEY . "[][type]\">\n";
    foreach($optionArray as $optionValue => $optionValueArray) {
        $output .= "<option value=\"{$optionValue}\" ";
        if($optionValueArray['selected']) {
            $output .= "selected=\"true\" ";
        }
        $output .= ">{$optionValueArray['outputValue']}</option>\n";
    }
    $output .= "</select>";
    echo $output;
}
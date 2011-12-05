WP CDN Rewrite
==============
About
-----
This plugin will rewrite links on a WordPress page (theme, post, etc.) 
according to user-specified rules. The intent is to make working with 
certain CDNs, namely CloudFiles from Rackspace Cloud, that mirror web 
content as-is and distribute it through their CDN. By changing the 
hostname, files load from the CDN rather than the host the WordPress 
install is running off of.

WordPress doesn't have a built-in feature to do this and we weren't 
fond of the various plugins we had tried previously, so we wrote our 
own.

The following are rewritten if a rule matches:

1. Values in `href` attributes of A tags
2. Values in `src` attributes of IMG tags

License: [zlib/libpng license][1]

Installation
------------
### Requirements
+ [WordPress][2] 2.8+

### Install
Extract `wpcdnrewrite` into the `wp-content/plugins` directory on your 
WordPress install. Then go to Plugins > Installed Plugins from the 
WordPress admin site and click _Activate_ below _WP CDN Rewrite_.

### Configuration
The plugin creates a new section in the Settings area of the 
WordPress admin site titled 'WP CDN Rewrite'. All configuration is 
performed there.

First, add domains to the whitelist. URLs on these domains will be 
rewritten if a rule is found for the given URL.

Second, add rules. Two types of rules can be specified:

1.  Host rewrite
    
    These rules only change the host on a given URL. For cases along 
    the lines of the CloudFiles use case that we wrote this for, simply 
    specify the new host and the extension to match on (e.g., `jpg`).
2.  Full rewrite
    
    These rewrite everything except the filename in the URL. Specify 
    whatever should prefix the filename (e.g., `http://images.example.com/`).

[1]: http://opensource.org/licenses/zlib-license
[2]: http://wordpress.org

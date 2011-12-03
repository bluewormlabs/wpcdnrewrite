<h2>WP CDN Rewrite</h2>

<form id="wpcdnrewrite-config-form" method="post" action="<?php echo wp_nonce_url('options-general.php?page=' . self::$slug); ?>">
	<a class="button-secondary" href="options-general.php?page=<?php echo self::$slug; ?>">Cancel</a> 
	<input class="button-primary" type="submit" Name="save" value="<?php _e('Save Options'); ?>" id="submitbutton" />
</form>
<?php require_once('header.inc.php'); ?>

<form id="wpcdnrewrite-config-form" method="post" action="<?php echo wp_nonce_url('options-general.php?page=' . WP_CDN_Rewrite::SLUG); ?>">
	<a class="button-secondary" href="options-general.php?page=<?php echo WP_CDN_Rewrite::SLUG; ?>">Cancel</a> 
	<input class="button-primary" type="submit" Name="save" value="<?php _e('Save Options'); ?>" id="submitbutton" />
</form>

<?php require_once('footer.inc.php'); ?>
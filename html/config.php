<?php require_once('header.inc.php'); ?>

<form id="wpcdnrewrite-config-form" method="post" action="options.php">
    <table id="whitelistTable">
        <tr>
            <td colspan="3"><h3>Domains to do rewriting for</h3></td>
        </tr>
<?php
        $domainArray = get_option(WP_CDN_Rewrite::WHITELIST_KEY);

        $count = 0;
        if(count($domainArray) > 0) {
            foreach($domainArray as $domain) {
?>
                <tr id="domain<?php echo $count;?>">
                    <td>
                        <input name="<?php echo WP_CDN_Rewrite::WHITELIST_KEY;?>[]" type="text" value="<?php echo $domain ?>"/>
                    </td>
                    <td>
<?php
                        if($count !== 0) {
?>
                            <input type="button" class="button-primary" id="removeDomain<?php echo $count;?>" value="-" onClick="removeRow(this);" />
                    <?php
                        }
?>
                    </td>
                </tr>
<?php
                $count++;
            }
?>
                <tr id="addRow">
                    <td colspan="2">

                    </td>
                    <td>
                        <input type="button" class="button-primary" id="addDomain" value="Add" />
                    </td>
                </tr>
<?php
        }
?>
    </table>
    <table>
        <tr>
            <td>
                <a class="button-secondary" href="options-general.php?page=<?php echo WP_CDN_Rewrite::SLUG; ?>">Cancel</a>
            </td>
            <td>
                <input class="button-primary" type="submit" Name="save" value="<?php _e('Save Options'); ?>" id="submitbutton" />
                <?php settings_fields('wpcdnrewrite'); ?>
            </td>
        </tr>        
    </table>
</form>

<?php require_once('footer.inc.php'); ?>
<?php
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

require_once('header.inc.php');
require_once(dirname(__DIR__) . '/functions.php');
?>

<form id="wpcdnrewrite-config-form" method="post" action="options.php">
    <!-- START WHITELIST section -->
    <table id="whitelistTable">
        <thead>
            <tr>
                <th colspan="3"><h3>Domains to do rewriting for</h3></th>
            </tr>
        </thead>
        <tbody>
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
                <tr id="addDomainRow">
                    <td colspan="2">

                    </td>
                    <td>
                        <input type="button" class="button-primary" id="addDomain" value="Add" />
                    </td>
                </tr>
<?php
        }
?>
        </tbody>
    </table>
    <!-- END WHITELIST section -->
    <!-- START RULES section -->
    <table id="rulesTable">
        <thead>
            <tr>
                <th colspan="3"><h3>Rewrite Rules</h3></th>
            </tr>
            <tr>
                <th>Rewrite Type</th>
                <th>File Extension</th>
                <th>Rewrite URL</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
<?php
        $ruleArray = get_option(WP_CDN_Rewrite::RULES_KEY);

        $count = 0;
        if(count($ruleArray) > 0) {
            foreach($ruleArray as $rule) {
?>
                <tr id="rule<?php echo $count;?>">
                    <td>
                        <?php cdnrewrite_output_type_selector($rule['type']); ?>
                    </td>
                    <td>
                        <input type="text" name="<?php echo WP_CDN_Rewrite::RULES_KEY;?>[][match]" value="<?php echo $rule['match'];?>" />
                    </td>
                    <td>
                        <input type="text" name="<?php echo WP_CDN_Rewrite::RULES_KEY;?>[][rule]" value="<?php echo $rule['match'];?>" />
                    </td>
                    <td>
                        <input type="button" class="button-primary" id="removeDomain<?php echo $count;?>" value="-" onClick="removeRow(this);" />
                    </td>
                </tr>
<?php
                $count++;
            }
        }
?>
        <tr id="rule<?php echo $count;?>">
            <td>
                <?php cdnrewrite_output_type_selector(); ?>
            </td>
            <td>
                <input type="text" name="<?php echo WP_CDN_Rewrite::RULES_KEY;?>[][match]"/>
            </td>
            <td>
                <input type="text" name="<?php echo WP_CDN_Rewrite::RULES_KEY;?>[][rule]"/>
            </td>
            <td>
                <input type="button" class="button-primary" id="removeRule<?php echo $count;?>" value="-" onClick="removeRow(this);" />
            </td>
        </tr>
        <?php
        $count++;
        ?>
        <tr id="addRuleRow">
            <td colspan="3">
                &nbsp;
            </td>
            <td>
                <input type="button" class="button-primary" id="addRule" value="Add" />
            </td>
        </tr>
        </tbody>
    </table>
    <!-- END RULES section -->
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
<?php
/* Smarty version 3.1.36, created on 2022-11-05 13:17:31
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/affiliates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6366626b288de3_43736594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b800606c812e03989fa26deeb79a463fd129e3f6' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/affiliates.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6366626b288de3_43736594 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['inactive']->value) {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"danger",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['affiliatesdisabled'],'textcenter'=>true), 0, true);
?>

<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <div class="row">

        <div class="col-sm-4">
            <div class="affiliate-stat affiliate-stat-green alert-warning">
                <i class="fas fa-users"></i>
                <span><?php echo $_smarty_tpl->tpl_vars['visitors']->value;?>
</span>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesclicks'];?>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="affiliate-stat affiliate-stat-green alert-info">
                <i class="fas fa-shopping-cart"></i>
                <span><?php echo $_smarty_tpl->tpl_vars['signups']->value;?>
</span>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatessignups'];?>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="affiliate-stat affiliate-stat-green alert-success">
                <i class="far fa-chart-bar"></i>
                <span><?php echo $_smarty_tpl->tpl_vars['conversionrate']->value;?>
%</span>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesconversionrate'];?>

            </div>
        </div>

    </div>

    <div class="affiliate-referral-link text-center">

        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesreferallink'];?>
</h3>
        <span><?php echo $_smarty_tpl->tpl_vars['referrallink']->value;?>
</span>

    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped table-rounded">
                <tr>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatescommissionspending'];?>
:</td>
                    <td><strong><?php echo $_smarty_tpl->tpl_vars['pendingcommissions']->value;?>
</strong></td>
                </tr>
                <tr>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatescommissionsavailable'];?>
:</td>
                    <td><strong><?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
</strong></td>
                </tr>
                <tr>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliateswithdrawn'];?>
:</td>
                    <td><strong><?php echo $_smarty_tpl->tpl_vars['withdrawn']->value;?>
</strong></td>
                </tr>
            </table>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['withdrawrequestsent']->value) {?>
        <div class="alert alert-success">
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliateswithdrawalrequestsuccessful'];?>
</p>
        </div>
    <?php } else { ?>
        <p class="text-center">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=withdrawrequest" class="btn btn-lg btn-danger<?php if (!$_smarty_tpl->tpl_vars['withdrawlevel']->value) {?> disabled" disabled="disabled<?php }?>">
                <i class="fas fa-university"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesrequestwithdrawal'];?>

            </a>
        </p>
        <?php if (!$_smarty_tpl->tpl_vars['withdrawlevel']->value) {?>
            <p class="text-muted text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"affiliateWithdrawalSummary",'amountForWithdrawal'=>$_smarty_tpl->tpl_vars['affiliatePayoutMinimum']->value),$_smarty_tpl ) );?>
</p>
        <?php }?>
    <?php }?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['affiliatesreferals']), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/tablelist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('tableName'=>"AffiliatesList"), 0, true);
?>
    <?php echo '<script'; ?>
 type="text/javascript">
        jQuery(document).ready( function ()
        {
            var table = jQuery('#tableAffiliatesList').removeClass('hidden').DataTable();
            <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'regdate') {?>
                table.order(0, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
            <?php } elseif ($_smarty_tpl->tpl_vars['orderby']->value == 'product') {?>
                table.order(1, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
            <?php } elseif ($_smarty_tpl->tpl_vars['orderby']->value == 'amount') {?>
                table.order(2, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
            <?php } elseif ($_smarty_tpl->tpl_vars['orderby']->value == 'status') {?>
                table.order(4, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
            <?php }?>
            table.draw();
            jQuery('#tableLoading').addClass('hidden');
        });
    <?php echo '</script'; ?>
>
    <div class="table-container clearfix">
        <table id="tableAffiliatesList" class="table table-list hidden">
            <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatessignupdate'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderproduct'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesamount'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatescommission'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesstatus'];?>
</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['referrals']->value, 'referral');
$_smarty_tpl->tpl_vars['referral']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['referral']->value) {
$_smarty_tpl->tpl_vars['referral']->do_else = false;
?>
                <tr class="text-center">
                    <td><span class="hidden"><?php echo $_smarty_tpl->tpl_vars['referral']->value['datets'];?>
</span><?php echo $_smarty_tpl->tpl_vars['referral']->value['date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['referral']->value['service'];?>
</td>
                    <td data-order="<?php echo $_smarty_tpl->tpl_vars['referral']->value['amountnum'];?>
"><?php echo $_smarty_tpl->tpl_vars['referral']->value['amountdesc'];?>
</td>
                    <td data-order="<?php echo $_smarty_tpl->tpl_vars['referral']->value['commissionnum'];?>
"><?php echo $_smarty_tpl->tpl_vars['referral']->value['commission'];?>
</td>
                    <td><span class='label status status-<?php echo strtolower($_smarty_tpl->tpl_vars['referral']->value['rawstatus']);?>
'><?php echo $_smarty_tpl->tpl_vars['referral']->value['status'];?>
</span></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <div class="text-center" id="tableLoading">
            <p><i class="fas fa-spinner fa-spin"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['loading'];?>
</p>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['affiliatelinkscode']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['affiliateslinktous']), 0, true);
?>
        <div class="margin-bottom text-center">
            <?php echo $_smarty_tpl->tpl_vars['affiliatelinkscode']->value;?>

        </div>
    <?php }?>

<?php }
}
}

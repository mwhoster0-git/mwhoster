<?php
/* Smarty version 3.1.36, created on 2023-01-07 10:19:33
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/upgradesummary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63b947357b8428_14115524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da662f24873f3029e15c26058a0ee746822a75c8' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/upgradesummary.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b947357b8428_14115524 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['promoerror']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['promoerror']->value,'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['promorecurring']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['recurringpromodesc'],$_smarty_tpl->tpl_vars['promorecurring']->value )),'textcenter'=>true), 0, true);
}?>

<div class="alert alert-block alert-info text-center">
    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradecurrentconfig'];?>
: <strong><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['productname']->value;?>
</strong><?php if ($_smarty_tpl->tpl_vars['domain']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
)<?php }?>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="60%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderdesc'];?>
</th>
            <th width="40%" class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprice'];?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upgrades']->value, 'upgrade', false, 'num');
$_smarty_tpl->tpl_vars['upgrade']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['upgrade']->value) {
$_smarty_tpl->tpl_vars['upgrade']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>
                <tr>
                    <td><input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['upgrade']->value['newproductid'];?>
" /><input type="hidden" name="billingcycle" value="<?php echo $_smarty_tpl->tpl_vars['upgrade']->value['newproductbillingcycle'];?>
" /><?php echo $_smarty_tpl->tpl_vars['upgrade']->value['oldproductname'];?>
 => <?php echo $_smarty_tpl->tpl_vars['upgrade']->value['newproductname'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['upgrade']->value['price'];?>
</td>
                </tr>
            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "configoptions") {?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['upgrade']->value['configname'];?>
: <?php echo $_smarty_tpl->tpl_vars['upgrade']->value['originalvalue'];?>
 => <?php echo $_smarty_tpl->tpl_vars['upgrade']->value['newvalue'];?>
</td>
                    <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['upgrade']->value['price'];?>
</td>
                </tr>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr class="masspay-total">
            <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersubtotal'];?>
:</td>
            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['promodesc']->value) {?>
            <tr class="masspay-total">
                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['promodesc']->value;?>
:</td>
                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
</td>
            </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['taxrate']->value) {?>
            <tr class="masspay-total">
                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['taxname']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate']->value;?>
%:</td>
                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['tax']->value;?>
</td>
            </tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['taxrate2']->value) {?>
            <tr class="masspay-total">
                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
%:</td>
                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['tax2']->value;?>
</td>
            </tr>
        <?php }?>
        <tr class="masspay-total">
            <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
:</td>
            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
        </tr>
    </tbody>
</table>

<?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>((((($_smarty_tpl->tpl_vars['LANG']->value['upgradeproductlogic']).(' (')).($_smarty_tpl->tpl_vars['upgrade']->value['daysuntilrenewal'])).(' ')).($_smarty_tpl->tpl_vars['LANG']->value['days'])).(')'),'textcenter'=>true), 0, true);
}?>

<div class="row">
    <div class="col-sm-6">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
" role="form">
            <input type="hidden" name="step" value="2" />
            <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
            <?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>
                <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['upgrades']->value[0]['newproductid'];?>
" />
                <input type="hidden" name="billingcycle" value="<?php echo $_smarty_tpl->tpl_vars['upgrades']->value[0]['newproductbillingcycle'];?>
" />
            <?php }?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['orderpromotioncode']), 0, true);
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoptions']->value, 'value', false, 'cid');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <input type="hidden" name="configoption[<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <div class="input-group">
                <input class="form-control" type="text" name="promocode" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromotioncode'];?>
" width="40"
                        <?php if ($_smarty_tpl->tpl_vars['promocode']->value) {?>value="<?php echo $_smarty_tpl->tpl_vars['promocode']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['promodesc']->value;?>
" disabled="disabled"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['promocode']->value) {?>
                    <span class="input-group-btn">
                        <input type="submit" name="removepromo" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderdontusepromo'];?>
"
                               class="btn btn-danger" />
                    </span>
                <?php } else { ?>
                    <span class="input-group-btn">
                        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromovalidatebutton'];?>
" class="btn btn-success" />
                    </span>
                <?php }?>
            </div>
        </form>

    </div>
    <div class="col-sm-6">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
            <input type="hidden" name="step" value="3" />
            <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
            <?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>
                <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['upgrades']->value[0]['newproductid'];?>
" />
                <input type="hidden" name="billingcycle" value="<?php echo $_smarty_tpl->tpl_vars['upgrades']->value[0]['newproductbillingcycle'];?>
" />
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoptions']->value, 'value', false, 'cid');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <input type="hidden" name="configoption[<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['promocode']->value) {?><input type="hidden" name="promocode" value="<?php echo $_smarty_tpl->tpl_vars['promocode']->value;?>
"><?php }?>

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod']), 0, true);
?>
            <div class="form-group">
                <select name="paymentmethod" id="inputPaymentMethod" class="form-control">
                    <?php if ($_smarty_tpl->tpl_vars['allowgatewayselection']->value) {?>
                        <option value="none"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['paymentmethoddefault'];?>
</option>
                    <?php }?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gateways']->value, 'gateway', false, 'num');
$_smarty_tpl->tpl_vars['gateway']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['gateway']->value) {
$_smarty_tpl->tpl_vars['gateway']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
"<?php if ($_smarty_tpl->tpl_vars['gateway']->value['sysname'] == $_smarty_tpl->tpl_vars['selectedgateway']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

    </div>
</div>

<div class="form-group text-center">
    <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordercontinuebutton'];?>
" class="btn btn-primary" id="btnOrderContinue" />
</div>

</form>
<?php }
}

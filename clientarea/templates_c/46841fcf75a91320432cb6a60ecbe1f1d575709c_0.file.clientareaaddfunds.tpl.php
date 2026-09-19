<?php
/* Smarty version 3.1.36, created on 2022-11-10 07:17:43
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareaaddfunds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636ca597b74067_23650163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46841fcf75a91320432cb6a60ecbe1f1d575709c' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareaaddfunds.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636ca597b74067_23650163 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['addfundsdisabled']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['clientareaaddfundsdisabled'],'textcenter'=>true), 0, true);
} elseif ($_smarty_tpl->tpl_vars['notallowed']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['clientareaaddfundsnotallowed'],'textcenter'=>true), 0, true);
} elseif ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value,'textcenter'=>true), 0, true);
}?>

<?php if (!$_smarty_tpl->tpl_vars['addfundsdisabled']->value) {?>

    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td class="textright"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfundsminimum'];?>
</strong></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['minimumamount']->value;?>
</td>
                    </tr>
                    <tr>
                        <td class="textright"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfundsmaximum'];?>
</strong></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['maximumamount']->value;?>
</td>
                    </tr>
                    <tr>
                        <td class="textright"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfundsmaximumbalance'];?>
</strong></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['maximumbalance']->value;?>
</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=addfunds">
                        <fieldset>
                            <div class="form-group">
                                <label for="amount" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfundsamount'];?>
:</label>
                                <input type="text" name="amount" id="amount"
                                       value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="paymentmethod" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod'];?>
:</label><br/>
                                <select name="paymentmethod" id="paymentmethod" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gateways']->value, 'gateway');
$_smarty_tpl->tpl_vars['gateway']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gateway']->value) {
$_smarty_tpl->tpl_vars['gateway']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
"><?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfunds'];?>
" class="btn btn-primary btn-block" />
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['addfundsnonrefundable'];?>

                </div>
            </div>
        </div>

    </div>

<?php }
}
}

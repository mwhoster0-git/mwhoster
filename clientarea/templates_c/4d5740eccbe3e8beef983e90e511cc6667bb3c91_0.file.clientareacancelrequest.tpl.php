<?php
/* Smarty version 3.1.36, created on 2022-12-04 08:33:42
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareacancelrequest.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_638c5b669478c0_38555131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d5740eccbe3e8beef983e90e511cc6667bb3c91' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareacancelrequest.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638c5b669478c0_38555131 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['invalid']->value) {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['clientareacancelinvalid'],'textcenter'=>true), 0, true);
?>
    <p class="text-center">
        <a href="clientarea.php?action=productdetails&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
    </p>

<?php } elseif ($_smarty_tpl->tpl_vars['requested']->value) {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['clientareacancelconfirmation'],'textcenter'=>true), 0, true);
?>

    <p class="text-center">
        <a href="clientarea.php?action=productdetails&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
    </p>

<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>"<li>".((string)$_smarty_tpl->tpl_vars['LANG']->value['clientareacancelreasonrequired'])."</li>"), 0, true);
?>
    <?php }?>

    <?php ob_start();
if ($_smarty_tpl->tpl_vars['domain']->value) {
echo " (";
echo (string)$_smarty_tpl->tpl_vars['domain']->value;
echo ")";
}
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'textcenter'=>true,'msg'=>((string)$_smarty_tpl->tpl_vars['LANG']->value['clientareacancelproduct']).": <strong>".((string)$_smarty_tpl->tpl_vars['groupname']->value)." - ".((string)$_smarty_tpl->tpl_vars['productname']->value)."</strong>".$_prefixVariable1), 0, true);
?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=cancel&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="form-stacked">
        <input type="hidden" name="sub" value="submit" />

        <fieldset>
            <div class="form-group">
                <label for="cancellationreason"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancelreason'];?>
</label>
                <textarea name="cancellationreason" id="cancellationreason" class="form-control fullwidth" rows="6"></textarea>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['domainid']->value) {?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancelrequestdomain'];?>
</h3>
                </div>
                <div class="panel-body">
                    <p><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cancelrequestdomaindesc'],$_smarty_tpl->tpl_vars['domainnextduedate']->value,$_smarty_tpl->tpl_vars['domainprice']->value,$_smarty_tpl->tpl_vars['domainregperiod']->value ));?>
</p>
                    <div class="col-sm-12 text-center">
                        <label class="checkbox">
                            <input type="checkbox" name="canceldomain" id="canceldomain" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancelrequestdomainconfirm'];?>

                        </label>
                    </div>
                </div>
            </div>
            <?php }?>

            <div class="form-group">
                <div class="form-inline text-center">
                    <label class="control-label" for="type"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancellationtype'];?>
</label>
                    <select name="type" id="type" class="form-control">
                        <option value="Immediate"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancellationimmediate'];?>
</option>
                        <option value="End of Billing Period"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancellationendofbillingperiod'];?>
</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline text-center">
                    <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancelrequestbutton'];?>
" class="btn btn-danger" />
                    <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
</a>
                </div>
            </div>

        </fieldset>

    </form>

<?php }
}
}

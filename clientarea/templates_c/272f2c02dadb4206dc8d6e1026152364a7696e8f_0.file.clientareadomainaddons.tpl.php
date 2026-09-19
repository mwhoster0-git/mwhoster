<?php
/* Smarty version 3.1.36, created on 2023-04-26 22:26:29
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainaddons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_64499705725795_98248273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '272f2c02dadb4206dc8d6e1026152364a7696e8f' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainaddons.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64499705725795_98248273 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domainaddons" class="form-horizontal">
    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['addon']->value;?>
">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
">
    <input type="hidden" name="confirm" value="1">
    <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

    <?php if ($_smarty_tpl->tpl_vars['action']->value == "buy") {?>
        <input type="hidden" name="buy" value="<?php echo $_smarty_tpl->tpl_vars['addon']->value;?>
">
        <?php if ($_smarty_tpl->tpl_vars['addon']->value == "dnsmanagement") {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainaddonsdnsmanagement']), 0, true);
?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>"Domain: <strong>".((string)$_smarty_tpl->tpl_vars['domain']->value)."</strong>",'textcenter'=>true), 0, true);
?>

            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsdnsmanagementinfo'];?>
</p>

            <p align="center">
                <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsbuynow'];?>
 <?php echo $_smarty_tpl->tpl_vars['addonspricing']->value['dnsmanagement'];
echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsperyear'];?>
" class="btn btn-success btn-lg" />
            </p>
        <?php } elseif ($_smarty_tpl->tpl_vars['addon']->value == "emailfwd") {?>

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding']), 0, true);
?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>"Domain: <strong>".((string)$_smarty_tpl->tpl_vars['domain']->value)."</strong>",'textcenter'=>true), 0, true);
?>

            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsemailforwardinginfo'];?>
</p>

            <p align="center">
                <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsbuynow'];?>
 <?php echo $_smarty_tpl->tpl_vars['addonspricing']->value['emailforwarding'];
echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsperyear'];?>
" class="btn btn-success btn-lg" />
            </p>
        <?php } elseif ($_smarty_tpl->tpl_vars['addon']->value == "idprotect") {?>

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainidprotection']), 0, true);
?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>"Domain: <strong>".((string)$_smarty_tpl->tpl_vars['domain']->value)."</strong>",'textcenter'=>true), 0, true);
?>

            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsidprotectioninfo'];?>
</p>

            <p align="center">
                <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsbuynow'];?>
 <?php echo $_smarty_tpl->tpl_vars['addonspricing']->value['idprotection'];
echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsperyear'];?>
" class="btn btn-success btn-lg" />
            </p>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == "disable") {?>
        <input type="hidden" name="disable" value="<?php echo $_smarty_tpl->tpl_vars['addon']->value;?>
">
        <?php if ($_smarty_tpl->tpl_vars['addon']->value == "dnsmanagement") {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainaddonsdnsmanagement']), 0, true);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['addon']->value == "emailfwd") {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding']), 0, true);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['addon']->value == "idprotect") {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['domainidprotection']), 0, true);
?>
        <?php }?>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>"Domain: <strong>".((string)$_smarty_tpl->tpl_vars['domain']->value)."</strong>",'textcenter'=>true), 0, true);
?>

        <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['domainaddonscancelsuccess'],'textcenter'=>true), 0, true);
?>
        <?php } elseif ($_smarty_tpl->tpl_vars['error']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['domainaddonscancelfailed'],'textcenter'=>true), 0, true);
?>
        <?php } else { ?>
            <p class="text-center">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonscancelareyousure'];?>

            </p>

            <p class="text-center">
                <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainaddonsconfirm'];?>
" class="btn btn-danger btn-lg" />
            </p>
        <?php }?>
    <?php }?>

    <p><a href="clientarea.php?action=domaindetails&id=<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a></p>

</form>
<?php }
}

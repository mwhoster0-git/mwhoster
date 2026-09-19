<?php
/* Smarty version 3.1.36, created on 2022-11-11 09:39:19
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomaindns.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636e18476f2b46_64964310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83cfcee136f16f7ea7328a78e18677f307318464' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomaindns.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636e18476f2b46_64964310 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>
</h3>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagementdesc']), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['error']->value), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['external']->value) {?>

    <br />
    <br />
    <div class="text-center">
        <?php echo $_smarty_tpl->tpl_vars['code']->value;?>

    </div>
    <br />
    <br />
    <br />
    <br />

<?php } else { ?>

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domaindns">
        <input type="hidden" name="sub" value="save" />
        <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnshostname'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsrecordtype'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsaddress'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnspriority'];?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dnsrecords']->value, 'dnsrecord');
$_smarty_tpl->tpl_vars['dnsrecord']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dnsrecord']->value) {
$_smarty_tpl->tpl_vars['dnsrecord']->do_else = false;
?>
                <tr>
                    <td><input type="hidden" name="dnsrecid[]" value="<?php echo $_smarty_tpl->tpl_vars['dnsrecord']->value['recid'];?>
" /><input type="text" name="dnsrecordhost[]" value="<?php echo $_smarty_tpl->tpl_vars['dnsrecord']->value['hostname'];?>
" size="10" class="form-control" /></td>
                    <td>
                        <select name="dnsrecordtype[]" class="form-control">
                        <option value="A"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "A") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.a"),$_smarty_tpl ) );?>
</option>
                        <option value="AAAA"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "AAAA") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.aaaa"),$_smarty_tpl ) );?>
</option>
                        <option value="MXE"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "MXE") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.mxe"),$_smarty_tpl ) );?>
</option>
                        <option value="MX"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "MX") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.mx"),$_smarty_tpl ) );?>
</option>
                        <option value="CNAME"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "CNAME") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.cname"),$_smarty_tpl ) );?>
</option>
                        <option value="TXT"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "TXT") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.txt"),$_smarty_tpl ) );?>
</option>
                        <option value="URL"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "URL") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.url"),$_smarty_tpl ) );?>
</option>
                        <option value="FRAME"<?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "FRAME") {?> selected="selected"<?php }?>><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.frame"),$_smarty_tpl ) );?>
</option>
                        </select>
                    </td>
                    <td><input type="text" name="dnsrecordaddress[]" value="<?php echo $_smarty_tpl->tpl_vars['dnsrecord']->value['address'];?>
" size="40" class="form-control" /></td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['dnsrecord']->value['type'] == "MX") {?><input type="text" name="dnsrecordpriority[]" value="<?php echo $_smarty_tpl->tpl_vars['dnsrecord']->value['priority'];?>
" size="2" class="form-control" /><?php } else { ?><input type="hidden" name="dnsrecordpriority[]" value="N/A" /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregnotavailable'];
}?>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr>
                    <td><input type="text" name="dnsrecordhost[]" size="10" class="form-control" /></td>
                    <td>
                        <select name="dnsrecordtype[]" class="form-control">
                            <option value="A"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.a"),$_smarty_tpl ) );?>
</option>
                            <option value="AAAA"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.aaaa"),$_smarty_tpl ) );?>
</option>
                            <option value="MXE"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.mxe"),$_smarty_tpl ) );?>
</option>
                            <option value="MX"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.mx"),$_smarty_tpl ) );?>
</option>
                            <option value="CNAME"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.cname"),$_smarty_tpl ) );?>
</option>
                            <option value="TXT"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.txt"),$_smarty_tpl ) );?>
</option>
                            <option value="URL"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.url"),$_smarty_tpl ) );?>
</option>
                            <option value="FRAME"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainDns.frame"),$_smarty_tpl ) );?>
</option>
                        </select>
                    </td>
                    <td><input type="text" name="dnsrecordaddress[]" size="40" class="form-control" /></td>
                    <td><input type="text" name="dnsrecordpriority[]" size="2" class="form-control" /></td>
                </tr>
            </tbody>
        </table>

        <p class="text-right">
            * <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmxonly'];?>

        </p>

        <p class="text-center">
            <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" /> <input type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancel'];?>
" class="btn btn-default" />
        </p>

    </form>

<?php }
}
}

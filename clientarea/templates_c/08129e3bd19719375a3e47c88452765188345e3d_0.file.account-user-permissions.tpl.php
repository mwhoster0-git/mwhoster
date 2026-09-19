<?php
/* Smarty version 3.1.36, created on 2022-12-01 04:29:13
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/account-user-permissions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63882d996ac431_98195624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08129e3bd19719375a3e47c88452765188345e3d' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/account-user-permissions.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63882d996ac431_98195624 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"userManagement.managePermissions"),$_smarty_tpl ) );?>
</h2>

<p><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</p>

<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"userManagement.permissions"),$_smarty_tpl ) );?>
</h3>

<form method="post" action="<?php echo routePath('account-users-permissions-save',$_smarty_tpl->tpl_vars['user']->value->id);?>
">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permissions']->value, 'permission');
$_smarty_tpl->tpl_vars['permission']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->do_else = false;
?>
        <label class="checkbox-inline">
            <input type="checkbox" name="perms[<?php echo $_smarty_tpl->tpl_vars['permission']->value['key'];?>
]" value="1"<?php if ($_smarty_tpl->tpl_vars['userPermissions']->value->hasPermission($_smarty_tpl->tpl_vars['permission']->value['key'])) {?> checked<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['permission']->value['title'];?>

            -
            <?php echo $_smarty_tpl->tpl_vars['permission']->value['description'];?>

        </label>
        <br>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <br>

    <p>
        <button type="submit" class="btn btn-primary">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareasavechanges"),$_smarty_tpl ) );?>

        </button>
        <a href="<?php echo routePath('account-users');?>
" class="btn btn-default">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareacancel"),$_smarty_tpl ) );?>

        </a>
    </p>

</form>
<?php }
}

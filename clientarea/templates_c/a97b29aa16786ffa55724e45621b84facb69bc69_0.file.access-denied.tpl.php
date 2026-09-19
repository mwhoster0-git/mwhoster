<?php
/* Smarty version 3.1.36, created on 2023-02-19 17:42:38
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/access-denied.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63f25f8e32e015_20336756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a97b29aa16786ffa55724e45621b84facb69bc69' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/access-denied.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63f25f8e32e015_20336756 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="error-container">
    <h1><?php echo $_smarty_tpl->tpl_vars['LANG']->value['oops'];?>
!</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['subaccountpermissiondenied'];?>
</p>
    <?php if (!empty($_smarty_tpl->tpl_vars['allowedpermissions']->value)) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['subaccountallowedperms'];?>
</p>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="well text-left">
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allowedpermissions']->value, 'permission');
$_smarty_tpl->tpl_vars['permission']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->do_else = false;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
</li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </div>
    <?php }?>
    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['subaccountcontactmaster'];?>
</p>
    <div class="buttons">
        <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg">
            <i class="fas fa-arrow-circle-left"></i>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['goback'];?>

        </a>
        <a href="index.php" class="btn btn-default btn-lg">
            <i class="fas fa-home"></i>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['returnhome'];?>

        </a>
    </div>
</div>
<?php }
}

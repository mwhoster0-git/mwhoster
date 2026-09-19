<?php
/* Smarty version 3.1.36, created on 2022-11-03 15:18:07
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/orderforms/standard_cart/sidebar-categories-collapsed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6363dbafc5c416_92682750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c78147ac9b1f4383135b85328279a4c52ca1ca2e' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/orderforms/standard_cart/sidebar-categories-collapsed.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/standard_cart/sidebar-categories-selector.tpl' => 1,
  ),
),false)) {
function content_6363dbafc5c416_92682750 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar-collapsed">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['secondarySidebar']->value, 'panel');
$_smarty_tpl->tpl_vars['panel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['panel']->value) {
$_smarty_tpl->tpl_vars['panel']->do_else = false;
?>
        <div class="panel card<?php if ($_smarty_tpl->tpl_vars['panel']->value->getClass()) {
echo $_smarty_tpl->tpl_vars['panel']->value->getClass();
} else { ?> panel-default<?php }?>">
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/standard_cart/sidebar-categories-selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['currencies']->value) {?>
        <div class="pull-right form-inline float-right">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/cart.php<?php if ($_smarty_tpl->tpl_vars['action']->value) {?>?a=<?php echo $_smarty_tpl->tpl_vars['action']->value;
if ($_smarty_tpl->tpl_vars['domain']->value) {?>&domain=<?php echo $_smarty_tpl->tpl_vars['domain']->value;
}
} elseif ($_smarty_tpl->tpl_vars['gid']->value) {?>?gid=<?php echo $_smarty_tpl->tpl_vars['gid']->value;
}?>">
                <select name="currency" onchange="submit()" class="form-control">
                    <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['choosecurrency'];?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'listcurr');
$_smarty_tpl->tpl_vars['listcurr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['listcurr']->value) {
$_smarty_tpl->tpl_vars['listcurr']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['listcurr']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['listcurr']->value['id'] == $_smarty_tpl->tpl_vars['currency']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['listcurr']->value['code'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </form>
        </div>
    <?php }?>

</div>
<?php }
}

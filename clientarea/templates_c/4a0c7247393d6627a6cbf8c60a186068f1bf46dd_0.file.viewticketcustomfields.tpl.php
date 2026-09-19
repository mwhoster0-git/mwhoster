<?php
/* Smarty version 3.1.36, created on 2024-07-02 12:18:57
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/admin/templates/blend/viewticketcustomfields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6683e2215bd779_23737404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a0c7247393d6627a6cbf8c60a186068f1bf46dd' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/admin/templates/blend/viewticketcustomfields.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6683e2215bd779_23737404 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['numcustomfields']->value) {?>
    <div align="center"><?php echo $_smarty_tpl->tpl_vars['_ADMINLANG']->value['support']['nocustomfields'];?>
</div>
<?php } else { ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=viewticket&id=<?php echo $_smarty_tpl->tpl_vars['ticketid']->value;?>
&sub=savecustomfields">
        <?php echo $_smarty_tpl->tpl_vars['csrfTokenHiddenInput']->value;?>

        <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
            <tr>
                <td width="25%" class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</td>
                <td class="fieldarea"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
        <div class="btn-container">
            <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['_ADMINLANG']->value['global']['savechanges'];?>
" class="btn btn-primary" />
            <input type="reset" value="<?php echo $_smarty_tpl->tpl_vars['_ADMINLANG']->value['global']['cancelchanges'];?>
" class="btn btn-default" />
        </div>
    </form>
<?php }
}
}

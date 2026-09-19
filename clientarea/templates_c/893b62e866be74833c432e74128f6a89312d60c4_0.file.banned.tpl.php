<?php
/* Smarty version 3.1.36, created on 2023-05-08 15:50:37
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/banned.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_64590c3da56140_45515274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '893b62e866be74833c432e74128f6a89312d60c4' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/banned.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64590c3da56140_45515274 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="alert alert-danger">
    <strong><i class="fas fa-gavel"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bannedyourip'];?>
 <?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bannedhasbeenbanned'];?>
</strong>
    <ul>
        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bannedbanreason'];?>
: <strong><?php echo $_smarty_tpl->tpl_vars['reason']->value;?>
</strong></li>
        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bannedbanexpires'];?>
: <?php echo $_smarty_tpl->tpl_vars['expires']->value;?>
</li>
    </ul>
</div>
<?php }
}

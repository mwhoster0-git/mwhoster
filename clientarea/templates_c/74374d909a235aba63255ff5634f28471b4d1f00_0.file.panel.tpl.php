<?php
/* Smarty version 3.1.36, created on 2022-11-07 13:00:15
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/includes/panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6369015f82b583_10682668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74374d909a235aba63255ff5634f28471b4d1f00' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/includes/panel.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6369015f82b583_10682668 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
    <?php if ((isset($_smarty_tpl->tpl_vars['headerTitle']->value))) {?>
        <div class="panel-heading">
            <h3 class="panel-title"><strong><?php echo $_smarty_tpl->tpl_vars['headerTitle']->value;?>
</strong></h3>
        </div>
    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['bodyContent']->value))) {?>
        <div class="panel-body<?php if ((isset($_smarty_tpl->tpl_vars['bodyTextCenter']->value))) {?> text-center<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['bodyContent']->value;?>

        </div>
    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['footerContent']->value))) {?>
        <div class="panel-footer<?php if ((isset($_smarty_tpl->tpl_vars['footerTextCenter']->value))) {?> text-center<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['footerContent']->value;?>

        </div>
    <?php }?>
</div>
<?php }
}

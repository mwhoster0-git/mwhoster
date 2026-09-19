<?php
/* Smarty version 3.1.36, created on 2022-11-03 14:56:33
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/includes/flashmessage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6363d6a1dc3a63_04050659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '136fa51948668d61c5cce1bdd8c189bb1290dc7e' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/includes/flashmessage.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6363d6a1dc3a63_04050659 (Smarty_Internal_Template $_smarty_tpl) {
$_prefixVariable1 = get_flash_message();
$_smarty_tpl->_assignInScope('message', $_prefixVariable1);
if ($_prefixVariable1) {?>
    <div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['message']->value['type'] == "error") {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['type'] == 'success') {?>success<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['type'] == 'warning') {?>warning<?php } else { ?>info<?php }
if ((isset($_smarty_tpl->tpl_vars['align']->value))) {?> text-<?php echo $_smarty_tpl->tpl_vars['align']->value;
}?>">
        <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>

    </div>
<?php }
}
}

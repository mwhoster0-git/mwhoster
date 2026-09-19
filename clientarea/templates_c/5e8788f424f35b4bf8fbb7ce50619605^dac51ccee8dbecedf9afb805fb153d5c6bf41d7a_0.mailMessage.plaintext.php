<?php
/* Smarty version 3.1.36, created on 2026-08-30 18:40:19
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a946b030de2d6_91247833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1788111619,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a946b030de2d6_91247833 (Smarty_Internal_Template $_smarty_tpl) {
?>To reset your password, please click on the link below.


<?php echo $_smarty_tpl->tpl_vars['reset_password_url']->value;?>



If you're having trouble, try copying and pasting the following URL into your browser:
<?php echo $_smarty_tpl->tpl_vars['reset_password_url']->value;?>



If you did not request this reset, you can ignore this email. It will expire in 2 hours.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

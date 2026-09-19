<?php
/* Smarty version 3.1.36, created on 2026-09-04 12:21:00
  from 'mailMessage:subject' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a9aa99c7500f9_43356316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3658c8804036d8e01de31155025e7476dc5a36b3' => 
    array (
      0 => 'mailMessage:subject',
      1 => 1788520860,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9aa99c7500f9_43356316 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['invite_sent_by_admin']->value) {?>An agent of <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
 has sent you an invite<?php } else {
echo $_smarty_tpl->tpl_vars['invite_sender_name']->value;?>
 has invited you to their account<?php }
}
}

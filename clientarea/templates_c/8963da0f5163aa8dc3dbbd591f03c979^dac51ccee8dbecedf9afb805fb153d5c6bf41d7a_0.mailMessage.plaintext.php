<?php
/* Smarty version 3.1.36, created on 2026-09-18 10:46:33
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6aad0879498144_04828979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1789724793,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aad0879498144_04828979 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['ticket_message']->value;?>


----------------------------------------------
Ticket ID: #<?php echo $_smarty_tpl->tpl_vars['ticket_id']->value;?>

Subject: <?php echo $_smarty_tpl->tpl_vars['ticket_subject']->value;?>

Status: <?php echo $_smarty_tpl->tpl_vars['ticket_status']->value;?>

Ticket URL: <?php echo $_smarty_tpl->tpl_vars['ticket_link']->value;?>

----------------------------------------------<?php }
}

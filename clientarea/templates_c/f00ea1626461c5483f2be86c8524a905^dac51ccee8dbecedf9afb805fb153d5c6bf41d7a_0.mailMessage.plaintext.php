<?php
/* Smarty version 3.1.36, created on 2026-09-19 09:03:20
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6aae41c8b034c5_31913239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1789805000,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aae41c8b034c5_31913239 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
, 

  This is a billing notice that your invoice no. <?php echo $_smarty_tpl->tpl_vars['invoice_num']->value;?>
 which was generated on <?php echo $_smarty_tpl->tpl_vars['invoice_date_created']->value;?>
 is now overdue. 

  Your payment method is: <?php echo $_smarty_tpl->tpl_vars['invoice_payment_method']->value;?>
 

  Invoice: <?php echo $_smarty_tpl->tpl_vars['invoice_num']->value;?>

 Balance Due: <?php echo $_smarty_tpl->tpl_vars['invoice_balance']->value;?>

 Due Date: <?php echo $_smarty_tpl->tpl_vars['invoice_date_due']->value;?>
 

  You can login to your client area to view and pay the invoice at <?php echo $_smarty_tpl->tpl_vars['invoice_link']->value;?>
 

  <?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

<?php
/* Smarty version 3.1.36, created on 2026-08-08 09:57:43
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a76ef871a7108_49154777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1786179463,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a76ef871a7108_49154777 (Smarty_Internal_Template $_smarty_tpl) {
?>A new cancellation request has been submitted.

Client ID: <?php echo $_smarty_tpl->tpl_vars['client_id']->value;?>

Client Name: <?php echo $_smarty_tpl->tpl_vars['clientname']->value;?>

Service ID: <?php echo $_smarty_tpl->tpl_vars['service_id']->value;?>

Product Name: <?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>

Cancellation Type: <?php echo $_smarty_tpl->tpl_vars['service_cancellation_type']->value;?>

Cancellation Reason: <?php echo $_smarty_tpl->tpl_vars['service_cancellation_reason']->value;?>


<?php echo $_smarty_tpl->tpl_vars['whmcs_admin_link']->value;
}
}

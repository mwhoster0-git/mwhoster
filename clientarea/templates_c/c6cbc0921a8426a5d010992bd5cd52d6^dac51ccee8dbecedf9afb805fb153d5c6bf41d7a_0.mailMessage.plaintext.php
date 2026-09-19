<?php
/* Smarty version 3.1.36, created on 2024-12-24 14:44:15
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_676ac8bf725ed4_60847613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1735051455,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676ac8bf725ed4_60847613 (Smarty_Internal_Template $_smarty_tpl) {
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

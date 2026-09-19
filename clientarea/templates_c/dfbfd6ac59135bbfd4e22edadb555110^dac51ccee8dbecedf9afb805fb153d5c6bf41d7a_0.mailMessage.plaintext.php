<?php
/* Smarty version 3.1.36, created on 2024-03-05 11:20:26
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_65e6fffabf81c5_02711846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1709637626,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e6fffabf81c5_02711846 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,

Recently you placed a domain transfer order with us but unfortunately it has failed. The reason for the failure if available is shown below so once this has been resolved, please contact us to re-attempt the transfer.

Domain: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>

Failure Reason: <?php echo $_smarty_tpl->tpl_vars['domain_transfer_failure_reason']->value;?>


If you have any questions, please open a support ticket from our client area @ <?php echo $_smarty_tpl->tpl_vars['whmcs_link']->value;?>


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

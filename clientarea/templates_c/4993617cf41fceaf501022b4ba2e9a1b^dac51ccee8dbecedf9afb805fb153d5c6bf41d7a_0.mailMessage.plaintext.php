<?php
/* Smarty version 3.1.36, created on 2025-03-05 17:52:13
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_67c88f4d9a5f80_61851513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1741197133,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67c88f4d9a5f80_61851513 (Smarty_Internal_Template $_smarty_tpl) {
?>An invoice for the renewal of a domain has been paid but the renewal request submitted to the registrar failed.


Client ID: <?php echo $_smarty_tpl->tpl_vars['client_id']->value;?>

Domain ID: <?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>

Domain Name: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>

Error: <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>



<?php echo $_smarty_tpl->tpl_vars['whmcs_admin_link']->value;
}
}

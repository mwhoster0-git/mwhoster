<?php
/* Smarty version 3.1.36, created on 2026-09-07 15:42:06
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a9ecd3ee9d472_65813763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1788792126,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9ecd3ee9d472_65813763 (Smarty_Internal_Template $_smarty_tpl) {
?>This product/service has received its next payment and has been reactivated successfully.


Client ID: <?php echo $_smarty_tpl->tpl_vars['client_id']->value;?>

Service ID: <?php echo $_smarty_tpl->tpl_vars['service_id']->value;?>

Product/Service: <?php echo $_smarty_tpl->tpl_vars['service_product']->value;?>

Domain: <?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>



<?php echo $_smarty_tpl->tpl_vars['whmcs_admin_link']->value;
}
}

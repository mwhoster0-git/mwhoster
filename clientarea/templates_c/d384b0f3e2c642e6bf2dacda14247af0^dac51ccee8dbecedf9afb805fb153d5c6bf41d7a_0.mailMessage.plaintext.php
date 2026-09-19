<?php
/* Smarty version 3.1.36, created on 2026-09-14 13:38:12
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6aa7eab4d3dd01_40043033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1789389492,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aa7eab4d3dd01_40043033 (Smarty_Internal_Template $_smarty_tpl) {
?>An invoice for the renewal of a domain has been paid and the renewal request was submitted to the registrar successfully.


Client ID: <?php echo $_smarty_tpl->tpl_vars['client_id']->value;?>

Domain ID: <?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>

Domain Name: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>



<?php echo $_smarty_tpl->tpl_vars['whmcs_admin_link']->value;
}
}

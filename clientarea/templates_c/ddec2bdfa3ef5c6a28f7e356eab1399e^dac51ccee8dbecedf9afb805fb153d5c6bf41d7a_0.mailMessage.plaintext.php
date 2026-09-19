<?php
/* Smarty version 3.1.36, created on 2026-09-14 13:38:12
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6aa7eab4810743_03934566',
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
function content_6aa7eab4810743_03934566 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
, 

Thank you for your domain renewal order. Your domain renewal request for the domain listed below has now been completed.

Domain: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>

Renewal Length: <?php echo $_smarty_tpl->tpl_vars['domain_reg_period']->value;?>

Renewal Price: <?php echo $_smarty_tpl->tpl_vars['domain_recurring_amount']->value;?>

Next Due Date: <?php echo $_smarty_tpl->tpl_vars['domain_next_due_date']->value;?>
 

You may login to your client area at <?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
 to manage your domain. 

<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

<?php
/* Smarty version 3.1.36, created on 2024-03-05 09:38:12
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_65e6e8045c1f27_59590497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1709631492,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e6e8045c1f27_59590497 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
, 

Thank you for your domain transfer order. Your order has been received and we have now initiated the transfer process. The details of the domain purchase are below: 

Domain: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>

Registration Length: <?php echo $_smarty_tpl->tpl_vars['domain_reg_period']->value;?>

Transfer Price: <?php echo $_smarty_tpl->tpl_vars['domain_first_payment_amount']->value;?>

Renewal Price: <?php echo $_smarty_tpl->tpl_vars['domain_recurring_amount']->value;?>

Next Due Date: <?php echo $_smarty_tpl->tpl_vars['domain_next_due_date']->value;?>
 

You may login to your client area at <?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
 to manage your domain. 

<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

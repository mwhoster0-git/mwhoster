<?php
/* Smarty version 3.1.36, created on 2026-09-07 15:42:02
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a9ecd3a978691_83569306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1788792122,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9ecd3a978691_83569306 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


This is a notification that your service has now been unsuspended. The details of this unsuspension are below:


Product/Service: <?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;?>

<?php if ($_smarty_tpl->tpl_vars['service_domain']->value) {?>Domain: <?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>

<?php }?>Amount: <?php echo $_smarty_tpl->tpl_vars['service_recurring_amount']->value;?>

Due Date: <?php echo $_smarty_tpl->tpl_vars['service_next_due_date']->value;?>



<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

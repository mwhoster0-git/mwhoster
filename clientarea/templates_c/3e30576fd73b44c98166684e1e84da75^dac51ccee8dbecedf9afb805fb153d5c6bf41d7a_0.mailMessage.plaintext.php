<?php
/* Smarty version 3.1.36, created on 2026-08-08 09:57:42
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a76ef86c53cd2_13516076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1786179462,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a76ef86c53cd2_13516076 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,

This email is to confirm that we have received your cancellation request for the service listed below.

Product/Service: <?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;?>

Domain: <?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>


<?php if ($_smarty_tpl->tpl_vars['service_cancellation_type']->value == "Immediate") {?>The service will be terminated within the next 24 hours.<?php } else { ?>The service will be cancelled at the end of your current billing period on <?php echo $_smarty_tpl->tpl_vars['service_next_due_date']->value;?>
.<?php }?>

Thank you for using <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
 and we hope to see you again in the future.

<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

<?php
/* Smarty version 3.1.36, created on 2023-01-06 19:58:17
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63b87d590e0ba1_91441370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1673035097,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b87d590e0ba1_91441370 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


This is confirmation that a <?php if ($_smarty_tpl->tpl_vars['invoice_status']->value == "Refunded") {?>full<?php } else { ?>partial<?php }?> refund has been processed for Invoice #<?php echo $_smarty_tpl->tpl_vars['invoice_num']->value;?>



The refund has been <?php if ($_smarty_tpl->tpl_vars['invoice_refund_type']->value == "credit") {?>credited to your account balance with us<?php } else { ?>returned via the payment method you originally paid with<?php }?>.


<?php echo $_smarty_tpl->tpl_vars['invoice_html_contents']->value;?>



Amount Refunded: <?php echo $_smarty_tpl->tpl_vars['invoice_last_payment_amount']->value;
if ($_smarty_tpl->tpl_vars['invoice_last_payment_transid']->value) {?>
Transaction #: <?php echo $_smarty_tpl->tpl_vars['invoice_last_payment_transid']->value;
}?>


You may review your invoice history at any time by logging in to your client area.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

<?php
/* Smarty version 3.1.36, created on 2023-03-29 18:47:15
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_642479a31b2a13_05055725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1680112035,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642479a31b2a13_05055725 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


Re: <?php echo $_smarty_tpl->tpl_vars['service_product_name']->value;
if ($_smarty_tpl->tpl_vars['service_domain']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['service_domain']->value;?>
)<?php }?>



    Recently you placed an upgrade order with us.
    Today your automated renewal invoice has been generated for the product/service listed above which has invalidated the upgrade quote and invoice.
    As a result, your upgrade order has now been cancelled.



Should you wish to continue with the upgrade, we ask that you please first pay the renewal invoice, after which you will be able to order the upgrade again and simply pay the difference.


We thank you for your business.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

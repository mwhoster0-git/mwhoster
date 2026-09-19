<?php
/* Smarty version 3.1.36, created on 2026-06-05 09:01:47
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a22826bce9558_20935900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1780646507,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22826bce9558_20935900 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


The domain name listed below expired <?php echo $_smarty_tpl->tpl_vars['domain_days_after_expiry']->value;?>
 days ago.


<?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>



To ensure that the domain isn't registered by someone else, you should renew it now. To renew the domain, please visit the following page and follow the steps shown: <?php echo $_smarty_tpl->tpl_vars['whmcs_url']->value;?>
/cart.php?gid=renewals


Due to the domain expiring, the domain will not be accessible so any web site or email services associated with it will stop working. You may be able to renew it for up to 30 days after the renewal date.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

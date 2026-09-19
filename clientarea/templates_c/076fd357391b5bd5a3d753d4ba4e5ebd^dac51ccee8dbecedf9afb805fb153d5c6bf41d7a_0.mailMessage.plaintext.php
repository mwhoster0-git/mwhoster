<?php
/* Smarty version 3.1.36, created on 2024-03-08 23:20:25
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_65eb9d39f2e030_84940515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1709940025,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65eb9d39f2e030_84940515 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


We are pleased to confirm that your recent domain transfer has now been completed.


Order Date: <?php echo $_smarty_tpl->tpl_vars['domain_reg_date']->value;?>

Domain: <?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>

Status: <?php echo $_smarty_tpl->tpl_vars['domain_status']->value;?>



You may now login to your client area at <?php echo $_smarty_tpl->tpl_vars['whmcs_link']->value;?>
 to manage your domain.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

<?php
/* Smarty version 3.1.36, created on 2026-09-18 09:04:12
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6aacf07c9e7cc7_86684251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1789718652,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6aacf07c9e7cc7_86684251 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
,


This is a reminder that the domain listed below is scheduled to expire soon.


Domain Name - Expiry Date - Description


--------------------------------------------------------------

 
<?php echo $_smarty_tpl->tpl_vars['domain_name']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['domain_next_due_date']->value;?>
 - Expires in <?php echo $_smarty_tpl->tpl_vars['domain_days_until_nextdue']->value;?>
 Days


Please be aware that if your domain name expires, any web site or email services associated with it will stop working.


Renew it now to avoid interruption in service.


To renew your domain, <?php echo $_smarty_tpl->tpl_vars['domain_renewal_url']->value;?>
.


To view and manage your domains, you can login to our client area here: <?php echo $_smarty_tpl->tpl_vars['domains_manage_url']->value;?>



If you have any questions, please reply to this email. Thank you for using our domain name services.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

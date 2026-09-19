<?php
/* Smarty version 3.1.36, created on 2026-09-01 09:03:11
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a9686bf405532_44667087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1788249791,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9686bf405532_44667087 (Smarty_Internal_Template $_smarty_tpl) {
?>Dear <?php echo $_smarty_tpl->tpl_vars['client_name']->value;?>
, 

This is your monthly affiliate referrals report. You can view your referral statistics at any time by logging in to the client area. 

Total Visitors Referred: <?php echo $_smarty_tpl->tpl_vars['affiliate_total_visits']->value;?>

Current Earnings: <?php echo $_smarty_tpl->tpl_vars['affiliate_balance']->value;?>

Amount Withdrawn: <?php echo $_smarty_tpl->tpl_vars['affiliate_withdrawn']->value;?>
 

Your New Signups this Month 

<?php echo $_smarty_tpl->tpl_vars['affiliate_referrals_table']->value;?>
 

Remember, you can refer new customers using your unique affiliate link: <?php echo $_smarty_tpl->tpl_vars['affiliate_referral_url']->value;?>
 

<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

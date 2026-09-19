<?php
/* Smarty version 3.1.36, created on 2026-09-04 12:21:00
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6a9aa99c76d162_78756702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1788520860,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9aa99c76d162_78756702 (Smarty_Internal_Template $_smarty_tpl) {
?>You've been given access to <?php echo $_smarty_tpl->tpl_vars['invite_account_name']->value;?>
.
<?php if ($_smarty_tpl->tpl_vars['invite_sent_by_admin']->value) {?>An agent of <?php echo $_smarty_tpl->tpl_vars['company_name']->value;
} else {
echo $_smarty_tpl->tpl_vars['invite_sender_name']->value;
}?> has given you access to the <?php echo $_smarty_tpl->tpl_vars['invite_account_name']->value;?>
 account with <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
.


To accept the invite, please click on the link below.


<?php echo $_smarty_tpl->tpl_vars['invite_accept_url']->value;?>



Invitations are valid for 7 days from the time of issue. After that time, you will need to request a new invitation from the account administrator.


<?php echo $_smarty_tpl->tpl_vars['signature']->value;
}
}

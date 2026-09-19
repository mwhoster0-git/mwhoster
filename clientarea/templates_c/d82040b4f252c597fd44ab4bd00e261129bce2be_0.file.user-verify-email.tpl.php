<?php
/* Smarty version 3.1.36, created on 2022-11-07 15:09:28
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-verify-email.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63691fa8c80bc8_43615279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd82040b4f252c597fd44ab4bd00e261129bce2be' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-verify-email.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63691fa8c80bc8_43615279 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="text-center">
    <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
        <h2>
            <i class="fas fa-check fa-2x text-success"></i><br>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"emailVerification.success"),$_smarty_tpl ) );?>

        </h2>
    <?php } elseif ($_smarty_tpl->tpl_vars['expired']->value) {?>
        <h2>
            <i class="far fa-clock fa-2x text-warning"></i><br>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"emailVerification.expired"),$_smarty_tpl ) );?>

        </h2>

        <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
            <button class="btn btn-default btn-lg btn-resend-verify-email" data-email-sent="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailSent'];?>
" data-error-msg="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['error'];?>
" data-uri="<?php echo routePath('user-email-verification-resend');?>
">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['resendEmail'];?>

            </button>
        <?php } else { ?>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"emailVerification.loginToRequest"),$_smarty_tpl ) );?>
</p>
        <?php }?>
    <?php } else { ?>
        <h2>
            <i class="fas fa-times fa-2x text-danger"></i><br>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"emailVerification.notFound"),$_smarty_tpl ) );?>

        </h2>

        <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value) {?>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"emailVerification.loginToRequest"),$_smarty_tpl ) );?>
</p>
        <?php }?>
    <?php }?>

    <br><br>

    <a href="<?php echo routePath('login-index');?>
" class="btn btn-primary btn-lg">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.continueToClientArea"),$_smarty_tpl ) );?>

        &nbsp;
        <i class="fa fa-arrow-right"></i>
    </a>

    <br><br><br><br>
</div>
<?php }
}

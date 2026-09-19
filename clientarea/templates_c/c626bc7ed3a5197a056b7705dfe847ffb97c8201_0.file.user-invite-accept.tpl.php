<?php
/* Smarty version 3.1.36, created on 2022-12-01 04:22:28
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-invite-accept.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63882c04969ef9_43653716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c626bc7ed3a5197a056b7705dfe847ffb97c8201' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-invite-accept.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63882c04969ef9_43653716 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/PasswordStrength.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    window.langPasswordStrength = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrength"),$_smarty_tpl ) );?>
";
    window.langPasswordWeak = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrengthweak"),$_smarty_tpl ) );?>
";
    window.langPasswordModerate = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrengthmoderate"),$_smarty_tpl ) );?>
";
    window.langPasswordStrong = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrengthstrong"),$_smarty_tpl ) );?>
";
    jQuery(document).ready(function()
    {
        jQuery("#inputPassword").keyup(registerFormPasswordStrengthFeedback);
    });
<?php echo '</script'; ?>
>

<div class="row">
    <div class="col-md-10 col-md-offset-1 text-center">
        <?php if ($_smarty_tpl->tpl_vars['invite']->value) {?>
            <h2>
                <i class="fas fa-info fa-2x text-primary"></i>
                <br><br>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.youHaveBeenInvited",'clientName'=>$_smarty_tpl->tpl_vars['invite']->value->getClientName()),$_smarty_tpl ) );?>

            </h2>

            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.givenAccess",'senderName'=>$_smarty_tpl->tpl_vars['invite']->value->getSenderName(),'clientName'=>$_smarty_tpl->tpl_vars['invite']->value->getClientName(),'ot'=>"<strong>",'ct'=>"</strong>"),$_smarty_tpl ) );?>
</p>

            <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.inviteAcceptLoggedIn"),$_smarty_tpl ) );?>
</p>
            <?php } else { ?>
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.inviteAcceptLoggedOut"),$_smarty_tpl ) );?>
</p>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
                <form method="post" action="<?php echo routePath('invite-validate',$_smarty_tpl->tpl_vars['invite']->value->token);?>
">
                    <p>
                        <button type="submit" class="btn btn-default">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.accept"),$_smarty_tpl ) );?>

                        </button>
                    </p>
                </form>
            <?php } else { ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="invite-box">
                            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"login"),$_smarty_tpl ) );?>
</h2>
                            <form method="post" action="<?php echo routePath('login-validate');?>
" class="text-left">
                                <div class="form-group">
                                    <label for="inputLoginEmail"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginemail"),$_smarty_tpl ) );?>
</label>
                                    <input type="email" name="username" class="form-control" id="inputLoginEmail" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginemail"),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['email'];?>
">
                                </div>
                                <div class="form-group">
                                    <label for="inputLoginPassword"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginpassword"),$_smarty_tpl ) );?>
</label>
                                    <input type="password" name="password" class="form-control" id="inputLoginPassword" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginpassword"),$_smarty_tpl ) );?>
">
                                </div>
                                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('captchaForm'=>$_smarty_tpl->tpl_vars['captchaForm']->value,'containerClass'=>"form-group row"), 0, true);
?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default<?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"login"),$_smarty_tpl ) );?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="invite-box">
                            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"register"),$_smarty_tpl ) );?>
</h2>
                            <form method="post" action="<?php echo routePath('invite-validate',$_smarty_tpl->tpl_vars['invite']->value->token);?>
" class="text-left">
                                <div class="form-group">
                                    <label for="inputFirstName"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareafirstname"),$_smarty_tpl ) );?>
</label>
                                    <input type="text" class="form-control" name="firstname" id="inputFirstName" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareafirstname"),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['firstname'];?>
">
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientarealastname"),$_smarty_tpl ) );?>
</label>
                                    <input type="text" class="form-control" name="lastname" id="inputLastName" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientarealastname"),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['lastname'];?>
">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginemail"),$_smarty_tpl ) );?>
</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginemail"),$_smarty_tpl ) );?>
" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['email'];?>
">
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="inputPassword"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginpassword"),$_smarty_tpl ) );?>
</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="inputPassword" data-error-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthErrorThreshold']->value;?>
" data-warning-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthWarningThreshold']->value;?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"loginpassword"),$_smarty_tpl ) );?>
" autocomplete="off" />
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default generate-password" data-targetfields="inputPassword">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"generatePassword.btnShort"),$_smarty_tpl ) );?>

                                            </button>
                                        </span>
                                    </div>

                                    <div class="password-strength-meter">
                                        <div class="progress" style="height: 10px; margin-top: 10px">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                            </div>
                                        </div>
                                        <p class="text-center small text-muted" id="passwordStrengthTextLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrength"),$_smarty_tpl ) );?>
: <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"pwstrengthenter"),$_smarty_tpl ) );?>
</p>
                                    </div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['accept_tos']->value) {?>
                                    <div class="form-group text-center">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="accept" id="accept" />
                                            &nbsp;
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'ordertosagreement'),$_smarty_tpl ) );?>

                                            <a href="<?php echo $_smarty_tpl->tpl_vars['tos_url']->value;?>
" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'ordertos'),$_smarty_tpl ) );?>
</a>
                                        </label>
                                    </div>
                                <?php }?>
                                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('captchaForm'=>$_smarty_tpl->tpl_vars['captchaFormRegister']->value,'containerClass'=>"form-group row"), 0, true);
?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default<?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaFormRegister']->value);?>
">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"register"),$_smarty_tpl ) );?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }?>
        <?php } else { ?>
            <h2>
                <i class="fas fa-times fa-2x text-danger"></i><br>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.notFound"),$_smarty_tpl ) );?>

            </h2>

            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"accountInvite.contactAdministrator"),$_smarty_tpl ) );?>
</p>
        <?php }?>
    </div>
</div>

<br><br>
<?php }
}

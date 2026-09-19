<?php
/* Smarty version 3.1.36, created on 2022-12-14 14:48:07
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-security.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6399e227223898_55315909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96265c62c6dc03a37de153ec0d08d13cbaa89cc8' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-security.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6399e227223898_55315909 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'userManagement.settings'),$_smarty_tpl ) );?>
</p>

<?php if ($_smarty_tpl->tpl_vars['linkableProviders']->value) {?>
    <h2>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'remoteAuthn.titleLinkedAccounts'),$_smarty_tpl ) );?>

    </h2>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"clientsecurity"), 0, true);
?>

    <br>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"linktable"), 0, true);
?>

    <br>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['securityQuestions']->value->count() > 0) {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavsecurityquestions'];?>
</h2>

    <form method="post" action="<?php echo routePath('user-security-question');?>
">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->hasSecurityQuestion()) {?>
            <div class="form-group">
                <label for="inputCurrentAns" class="control-label"><?php echo $_smarty_tpl->tpl_vars['user']->value->getSecurityQuestion();?>
</label>
                <input type="password" name="currentsecurityqans" id="inputCurrentAns" class="form-control" autocomplete="off" />
            </div>
        <?php }?>

        <div class="form-group">
            <label for="inputSecurityQid" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityquestion'];?>
</label>
            <select name="securityqid" id="inputSecurityQid" class="form-control">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['securityQuestions']->value, 'question');
$_smarty_tpl->tpl_vars['question']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['question']->value->question;?>

                    </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputSecurityAns1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityanswer'];?>
</label>
                    <input type="password" name="securityqans" id="inputSecurityAns1" class="form-control" autocomplete="off" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputSecurityAns2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityconfanswer'];?>
</label>
                    <input type="password" name="securityqans2" id="inputSecurityAns2" class="form-control" autocomplete="off" />
                </div>
            </div>
        </div>

        <p>
            <input class="btn btn-primary" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
            <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
        </p>
    </form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['twoFactorAuthAvailable']->value) {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofactorauth'];?>
</h2>

    <p class="twofa-config-link disable<?php if (!$_smarty_tpl->tpl_vars['twoFactorAuthEnabled']->value) {?> hidden<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofacurrently'];?>
 <strong><?php echo strtolower($_smarty_tpl->tpl_vars['LANG']->value['enabled']);?>
</strong>
    </p>
    <p class="twofa-config-link enable<?php if ($_smarty_tpl->tpl_vars['twoFactorAuthEnabled']->value) {?> hidden<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofacurrently'];?>
 <strong><?php echo strtolower($_smarty_tpl->tpl_vars['LANG']->value['disabled']);?>
</strong>
    </p>

    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientAreaSecurityTwoFactorAuthRecommendation"),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_prefixVariable1), 0, true);
?>

    <a href="<?php echo routePath('account-security-two-factor-disable');?>
" class="btn btn-danger open-modal twofa-config-link disable<?php if (!$_smarty_tpl->tpl_vars['twoFactorAuthEnabled']->value) {?> hidden<?php }?>" data-modal-title="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofadisable'];?>
" data-modal-class="twofa-setup" data-btn-submit-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'twofadisable'),$_smarty_tpl ) );?>
" data-btn-submit-color="danger" data-btn-submit-id="btnDisable2FA">
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofadisableclickhere'];?>

    </a>
    <a href="<?php echo routePath('account-security-two-factor-enable');?>
" class="btn btn-success open-modal twofa-config-link enable<?php if ($_smarty_tpl->tpl_vars['twoFactorAuthEnabled']->value) {?> hidden<?php }?>" data-modal-title="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofaenable'];?>
" data-modal-class="twofa-setup" data-btn-submit-id="btnEnable2FA">
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['twofaenableclickhere'];?>

    </a>

    <br />
    <br />
<?php }
}
}

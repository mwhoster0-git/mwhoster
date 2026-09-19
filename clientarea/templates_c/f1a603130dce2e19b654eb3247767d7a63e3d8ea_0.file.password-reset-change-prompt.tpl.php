<?php
/* Smarty version 3.1.36, created on 2022-11-09 14:41:08
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/password-reset-change-prompt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636bbc047a0dd0_93949794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1a603130dce2e19b654eb3247767d7a63e3d8ea' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/password-reset-change-prompt.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636bbc047a0dd0_93949794 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwresetenternewpw'];?>
</p>

<form class="using-password-strength" method="POST" action="<?php echo routePath('password-reset-change-perform');?>
">
    <input type="hidden" name="answer" id="answer" value="<?php echo $_smarty_tpl->tpl_vars['securityAnswer']->value;?>
" />

    <div id="newPassword1" class="form-group has-feedback">
        <label class="control-label" for="inputNewPassword1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['newpassword'];?>
</label>
        <input type="password" name="newpw" id="inputNewPassword1" class="form-control" autocomplete="off" />
        <span class="form-control-feedback glyphicon glyphicon-password"></span>
    </div>

    <div id="newPassword2" class="form-group has-feedback">
        <label class="control-label" for="inputNewPassword2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['confirmnewpassword'];?>
</label>
        <input type="password" name="confirmpw" id="inputNewPassword2" class="form-control" autocomplete="off" />
        <span class="form-control-feedback glyphicon glyphicon-password"></span>
        <div id="inputNewPassword2Msg"></div>
    </div>

    <div class="form-group">
        <label class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrength'];?>
</label>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>

    <div class="form-group">
        <div class="text-center">
            <input class="btn btn-primary" type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
            <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
        </div>
    </div>

</form>
<?php }
}

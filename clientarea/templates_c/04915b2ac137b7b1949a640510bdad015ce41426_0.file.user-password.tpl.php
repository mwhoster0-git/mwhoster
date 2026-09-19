<?php
/* Smarty version 3.1.36, created on 2022-12-01 19:41:28
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63890368df5fd6_97764009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04915b2ac137b7b1949a640510bdad015ce41426' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-password.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63890368df5fd6_97764009 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<form class="form-horizontal using-password-strength" method="post" action="<?php echo routePath('user-password');?>
" role="form">
    <input type="hidden" name="submit" value="true" />
    <div class="form-group">
        <label for="inputExistingPassword" class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['existingpassword'];?>
</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="existingpw" id="inputExistingPassword" autocomplete="off" />
        </div>
    </div>
    <div id="newPassword1" class="form-group has-feedback">
        <label for="inputNewPassword1" class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['newpassword'];?>
</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off" />
            <span class="form-control-feedback glyphicon"></span>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-default generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['generatePassword']['btnLabel'];?>

            </button>
        </div>
    </div>
    <div id="newPassword2" class="form-group has-feedback">
        <label for="inputNewPassword2" class="col-sm-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['confirmnewpassword'];?>
</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off" />
            <span class="form-control-feedback glyphicon"></span>
            <div id="inputNewPassword2Msg"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            <input class="btn btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
            <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
        </div>
    </div>
</form>
<?php }
}

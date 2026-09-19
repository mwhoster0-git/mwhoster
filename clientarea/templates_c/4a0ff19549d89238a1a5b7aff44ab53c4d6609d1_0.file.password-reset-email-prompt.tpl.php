<?php
/* Smarty version 3.1.36, created on 2022-11-03 16:51:50
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/password-reset-email-prompt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6363f1a6e9d4a7_93515277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a0ff19549d89238a1a5b7aff44ab53c4d6609d1' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/password-reset-email-prompt.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6363f1a6e9d4a7_93515277 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwresetemailneeded'];?>
</p>

<form method="post" action="<?php echo routePath('password-reset-validate-email');?>
" role="form">
    <input type="hidden" name="action" value="reset" />

    <div class="form-group">
        <label for="inputEmail"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginemail'];?>
</label>
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['enteremail'];?>
" autofocus>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled()) {?>
        <div class="text-center margin-bottom">
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    <?php }?>

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary<?php echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);?>
">
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwresetsubmit'];?>

        </button>
    </div>

</form>
<?php }
}

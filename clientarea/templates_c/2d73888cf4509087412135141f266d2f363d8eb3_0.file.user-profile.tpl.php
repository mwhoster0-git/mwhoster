<?php
/* Smarty version 3.1.36, created on 2022-11-09 18:35:39
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636bf2fbe54191_74077263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d73888cf4509087412135141f266d2f363d8eb3' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/user-profile.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636bf2fbe54191_74077263 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['userProfile']['profile'];?>
</h2>

<form method="post" action="<?php echo routePath('user-profile-save');?>
">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="inputFirstName" class="control-label">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>

                </label>
                <input
                    type="text"
                    name="firstname"
                    id="inputFirstName"
                    value="<?php echo $_smarty_tpl->tpl_vars['user']->value->firstName;?>
"
                    class="form-control"
                    <?php if (in_array('firstname',$_smarty_tpl->tpl_vars['uneditableFields']->value)) {?>disabled="disabled"<?php }?>
                >
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="inputLastName" class="control-label">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>

                </label>
                <input
                    type="text"
                    name="lastname"
                    id="inputLastName"
                    value="<?php echo $_smarty_tpl->tpl_vars['user']->value->lastName;?>
"
                    class="form-control"
                    <?php if (in_array('lastname',$_smarty_tpl->tpl_vars['uneditableFields']->value)) {?>disabled="disabled"<?php }?>
                >
            </div>
        </div>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="save" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
        <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
    </div>
</form>

<br>

<h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['userProfile']['changeEmail'];?>
</h2>

<p>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->needsToCompleteEmailVerification()) {?>
        <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['userProfile']['notVerified'];?>
</span>
    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->emailVerified()) {?>
        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['userProfile']['verified'];?>
</span>
    <?php }?>
</p>

<form method="post" action="<?php echo routePath('user-profile-email-save');?>
">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="inputEmail" class="control-label">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>

                </label>
                <input
                    type="email"
                    name="email"
                    id="inputEmail"
                    value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
"
                    class="form-control"
                    <?php if (in_array('email',$_smarty_tpl->tpl_vars['uneditableFields']->value)) {?>disabled="disabled"<?php }?>
                >
            </div>
        </div>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="save" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
        <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
    </div>
</form>
<?php }
}

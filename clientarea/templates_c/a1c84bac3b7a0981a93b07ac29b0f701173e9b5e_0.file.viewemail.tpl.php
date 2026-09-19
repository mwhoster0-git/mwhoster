<?php
/* Smarty version 3.1.36, created on 2022-11-16 10:04:52
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/viewemail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6374b5c4870ad5_04617210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1c84bac3b7a0981a93b07ac29b0f701173e9b5e' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/viewemail.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6374b5c4870ad5_04617210 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemails'];?>
 - <?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
</title>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</head>
<body id="popup-backdrop">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="popup-header-padding"><i class='far fa-envelope'>&nbsp;</i><?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</h2>
            <?php if (count($_smarty_tpl->tpl_vars['attachments']->value) > 0) {?>
                <div class="popup-header-padding">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attachments']->value, 'attachedFile', true);
$_smarty_tpl->tpl_vars['attachedFile']->iteration = 0;
$_smarty_tpl->tpl_vars['attachedFile']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attachedFile']->value) {
$_smarty_tpl->tpl_vars['attachedFile']->do_else = false;
$_smarty_tpl->tpl_vars['attachedFile']->iteration++;
$_smarty_tpl->tpl_vars['attachedFile']->last = $_smarty_tpl->tpl_vars['attachedFile']->iteration === $_smarty_tpl->tpl_vars['attachedFile']->total;
$__foreach_attachedFile_0_saved = $_smarty_tpl->tpl_vars['attachedFile'];
?>
                        <i class="fal fa-paperclip"></i> <?php echo $_smarty_tpl->tpl_vars['attachedFile']->value;
if (!$_smarty_tpl->tpl_vars['attachedFile']->last) {?><br><?php }?>
                    <?php
$_smarty_tpl->tpl_vars['attachedFile'] = $__foreach_attachedFile_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        </div>
        <div class="panel-body main-content">
            <iframe width="100%" height="300" frameborder="0" srcdoc="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
"></iframe>
        </div>
        <div class="panel-footer">
            <p class="text-center">
                <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['closewindow'];?>
" class="btn btn-primary" onclick="window.close()" />
            </p>
        </div>
    </div>
</body>
</html>
<?php }
}

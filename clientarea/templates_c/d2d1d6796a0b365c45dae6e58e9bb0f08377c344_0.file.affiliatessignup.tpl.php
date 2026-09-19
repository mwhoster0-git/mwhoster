<?php
/* Smarty version 3.1.36, created on 2022-11-05 16:29:43
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/affiliatessignup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63668f778cf417_07883392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2d1d6796a0b365c45dae6e58e9bb0f08377c344' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/affiliatessignup.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63668f778cf417_07883392 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['affiliatesystemenabled']->value) {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'title'=>$_smarty_tpl->tpl_vars['LANG']->value['affiliatesignuptitle'],'msg'=>($_smarty_tpl->tpl_vars['LANG']->value['affiliatesignupintro']).('<br /><br />'),'textcenter'=>true), 0, true);
?>

    <ul>
        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesignupinfo1'];?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesignupinfo2'];?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesignupinfo3'];?>
</li>
    </ul>

    <br />

    <form method="post" action="affiliates.php">
        <input type="hidden" name="activate" value="true" />
        <p align="center">
            <input id="activateAffiliate" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['affiliatesactivate'];?>
" class="btn btn-success" />
        </p>
    </form>

<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['affiliatesdisabled'],'textcenter'=>true), 0, true);
}
}
}

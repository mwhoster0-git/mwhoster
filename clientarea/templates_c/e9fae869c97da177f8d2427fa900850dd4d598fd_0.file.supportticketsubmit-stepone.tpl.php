<?php
/* Smarty version 3.1.36, created on 2022-11-07 10:27:06
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/supportticketsubmit-stepone.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6368dd7a50e9e8_88009360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9fae869c97da177f8d2427fa900850dd4d598fd' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/supportticketsubmit-stepone.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6368dd7a50e9e8_88009360 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br />

<p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsheader'];?>
</p>

<br />

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'department', false, 'num');
$_smarty_tpl->tpl_vars['department']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['department']->value) {
$_smarty_tpl->tpl_vars['department']->do_else = false;
?>
                <div class="col-md-6 margin-bottom">
                    <p>
                        <strong>
                            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?step=2&amp;deptid=<?php echo $_smarty_tpl->tpl_vars['department']->value['id'];?>
">
                                <i class="fas fa-envelope"></i>
                                &nbsp;<?php echo $_smarty_tpl->tpl_vars['department']->value['name'];?>

                            </a>
                        </strong>
                    </p>
                    <?php if ($_smarty_tpl->tpl_vars['department']->value['description']) {?>
                        <p><?php echo $_smarty_tpl->tpl_vars['department']->value['description'];?>
</p>
                    <?php }?>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['num']->value%2 == true) {?>
                    <div class="clearfix"></div>
                <?php }?>
            <?php
}
if ($_smarty_tpl->tpl_vars['department']->do_else) {
?>
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['nosupportdepartments'],'textcenter'=>true), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</div>
<?php }
}

<?php
/* Smarty version 3.1.36, created on 2022-11-07 12:58:33
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/forwardpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636900f9450bf9_71329154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e3c6afbc0129216a22f68f8b4861df6e7bd35d8' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/forwardpage.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636900f9450bf9_71329154 (Smarty_Internal_Template $_smarty_tpl) {
?><br />

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['message']->value,'textcenter'=>true), 0, true);
?>

<br />

<div class="text-center">

    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_IMG']->value;?>
/loading.gif" alt="Loading" border="0" />

    <br /><br /><br />

    <div id="frmPayment" align="center">

        <?php echo $_smarty_tpl->tpl_vars['code']->value;?>


        <form method="post" action="<?php if ($_smarty_tpl->tpl_vars['invoiceid']->value) {?>viewinvoice.php?id=<?php echo $_smarty_tpl->tpl_vars['invoiceid']->value;
} else { ?>clientarea.php<?php }?>">
        </form>

    </div>

</div>

<br /><br /><br />

<?php echo '<script'; ?>
 language="javascript">
    setTimeout("autoSubmitFormByContainer('frmPayment')", 5000);
<?php echo '</script'; ?>
>
<?php }
}

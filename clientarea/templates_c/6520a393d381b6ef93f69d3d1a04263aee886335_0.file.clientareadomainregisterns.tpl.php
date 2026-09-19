<?php
/* Smarty version 3.1.36, created on 2022-11-11 09:39:16
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainregisterns.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636e1844645be5_36622661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6520a393d381b6ef93f69d3d1a04263aee886335' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainregisterns.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636e1844645be5_36622661 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisterns'];?>
</h3>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['domainregisternsexplanation']), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['result']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_smarty_tpl->tpl_vars['result']->value,'textcenter'=>true), 0, true);
}?>

<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domainregisterns">
    <input type="hidden" name="sub" value="register" />
    <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

    <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsreg'];?>
</h4>

    <div class="form-group">
        <label for="inputNs1" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsns'];?>
</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" id="inputNs1" name="ns" />
        </div>
        <div class="col-xs-5">
            . <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>

        </div>
    </div>
    <div class="form-group">
        <label for="inputIp1" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsip'];?>
</label>
        <div class="col-xs-6 col-sm-5">
            <input type="text" class="form-control" id="inputIp1" name="ipaddress" />
        </div>
    </div>

    <p class="text-center">
        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" />
    </p>

</form>

<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domainregisterns">
    <input type="hidden" name="sub" value="modify" />
    <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

    <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsmod'];?>
</h4>

    <div class="form-group">
        <label for="inputNs2" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsns'];?>
</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" id="inputNs2" name="ns" />
        </div>
        <div class="col-xs-5">
            . <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>

        </div>
    </div>
    <div class="form-group">
        <label for="inputIp2" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternscurrentip'];?>
</label>
        <div class="col-xs-6 col-sm-5">
            <input type="text" class="form-control" id="inputIp2" name="currentipaddress" />
        </div>
    </div>
    <div class="form-group">
        <label for="inputIp3" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsnewip'];?>
</label>
        <div class="col-xs-6 col-sm-5">
            <input type="text" class="form-control" id="inputIp3" name="newipaddress" />
        </div>
    </div>

    <p class="text-center">
        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" />
    </p>

</form>

<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domainregisterns">
    <input type="hidden" name="sub" value="delete" />
    <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

    <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsdel'];?>
</h4>

    <div class="form-group">
        <label for="inputNs3" class="col-xs-4 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregisternsns'];?>
</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" id="inputNs3" name="ns" />
        </div>
        <div class="col-xs-5">
            . <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>

        </div>
    </div>

    <p class="text-center">
        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" />
    </p>

</form>
<?php }
}

<?php
/* Smarty version 3.1.36, created on 2022-11-11 09:39:21
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainemailforwarding.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636e184913aad4_59443278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aae69a46357e6d69190d1b5b933f29d354785e36' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomainemailforwarding.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636e184913aad4_59443278 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>
</h3>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['domainemailforwardingdesc']), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['error']->value), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['external']->value) {?>

    <br />
    <br />
    <div class="text-center">
        <?php echo $_smarty_tpl->tpl_vars['code']->value;?>

    </div>
    <br /
    ><br />
    <br />
    <br />

<?php } else { ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domainemailforwarding">
        <input type="hidden" name="sub" value="save" />
        <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwardingprefix'];?>
</th>
                    <th></th>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwardingforwardto'];?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emailforwarders']->value, 'emailforwarder', false, 'num');
$_smarty_tpl->tpl_vars['emailforwarder']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['emailforwarder']->value) {
$_smarty_tpl->tpl_vars['emailforwarder']->do_else = false;
?>
                <tr>
                    <td><input type="text" name="emailforwarderprefix[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['emailforwarder']->value['prefix'];?>
" class="form-control" /></td>
                    <td class="text-center">@<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
 => </td>
                    <td><input type="text" name="emailforwarderforwardto[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['emailforwarder']->value['forwardto'];?>
" class="form-control" /></td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr>
                    <td><input type="text" name="emailforwarderprefixnew" class="form-control" /></td>
                    <td class="text-center">@<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
 => </td>
                    <td><input type="text" name="emailforwarderforwardtonew" class="form-control" /></td>
                </tr>
            </tbody>
        </table>

        <p class="text-center">
            <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" /> <input type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancel'];?>
" class="btn btn-default" />
        </p>

    </form>

<?php }
}
}

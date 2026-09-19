<?php
/* Smarty version 3.1.36, created on 2022-11-07 15:09:02
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareaemails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_63691f8e83b949_63374117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ca171a2d5b0610f3e3c0e45858dba4b371fd2bb' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareaemails.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63691f8e83b949_63374117 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/tablelist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('tableName'=>"EmailsList",'noSortColumns'=>"-1"), 0, true);
echo '<script'; ?>
 type="text/javascript">
    jQuery(document).ready( function ()
    {
        var table = jQuery('#tableEmailsList').removeClass('hidden').DataTable();
        <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'date') {?>
            table.order(0, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
        <?php } elseif ($_smarty_tpl->tpl_vars['orderby']->value == 'subject') {?>
            table.order(1, '<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
');
        <?php }?>
        table.draw();
        jQuery('#tableLoading').addClass('hidden');
    });
<?php echo '</script'; ?>
>
<div class="table-container clearfix">
    <table id="tableEmailsList" class="table table-list hidden">
        <thead>
            <tr>
                <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemailsdate'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemailssubject'];?>
</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emails']->value, 'email');
$_smarty_tpl->tpl_vars['email']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
$_smarty_tpl->tpl_vars['email']->do_else = false;
?>
            <tr onclick="popupWindow('viewemail.php?id=<?php echo $_smarty_tpl->tpl_vars['email']->value['id'];?>
', 'emailWin', '650', '450')">
                <td class="text-center"><span class="hidden"><?php echo $_smarty_tpl->tpl_vars['email']->value['normalisedDate'];?>
</span><?php echo $_smarty_tpl->tpl_vars['email']->value['date'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['email']->value['subject'];
if ($_smarty_tpl->tpl_vars['email']->value['attachmentCount'] > 0) {?> <i class="fal fa-paperclip"></i><?php }?></td>
                <td class="text-center"><input type="button" class="btn btn-info btn-sm" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailviewmessage'];?>
" onclick="popupWindow('viewemail.php?id=<?php echo $_smarty_tpl->tpl_vars['email']->value['id'];?>
', 'emailWin', '650', '450', 'scrollbars=1,')" /></td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <div class="text-center" id="tableLoading">
        <p><i class="fas fa-spinner fa-spin"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['loading'];?>
</p>
    </div>
</div>
<?php }
}

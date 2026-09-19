<?php
/* Smarty version 3.1.36, created on 2022-11-11 16:32:36
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/serverstatus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636e7924cef639_23038085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7aa332d82cf6e10600a8447b80c64a733764ff10' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/serverstatus.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636e7924cef639_23038085 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['issues']->value, 'issue');
$_smarty_tpl->tpl_vars['issue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['issue']->value) {
$_smarty_tpl->tpl_vars['issue']->do_else = false;
?>

    <div class="panel <?php if ($_smarty_tpl->tpl_vars['issue']->value['clientaffected']) {?>panel-warning<?php } else { ?>panel-info<?php }?>">
        <div class="panel-heading">
            <?php echo $_smarty_tpl->tpl_vars['issue']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['issue']->value['status'];?>
)
        </div>
        <ul class="list-group">
            <li id="issuePriorityLabel" class="list-group-item <?php if ($_smarty_tpl->tpl_vars['issue']->value['rawPriority'] == 'Critical') {?>list-group-item-danger<?php } elseif ($_smarty_tpl->tpl_vars['issue']->value['rawPriority'] == 'High') {?>list-group-item-warning<?php } elseif ($_smarty_tpl->tpl_vars['issue']->value['rawPriority'] == 'Low') {?>list-group-item-success<?php } else { ?>list-group-item-info<?php }?>"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkissuespriority'];?>
</strong> - <?php echo $_smarty_tpl->tpl_vars['issue']->value['priority'];?>
</li>
            <?php if ($_smarty_tpl->tpl_vars['issue']->value['server'] || $_smarty_tpl->tpl_vars['issue']->value['affecting']) {?><li class="list-group-item"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkissuesaffecting'];?>
 <?php echo $_smarty_tpl->tpl_vars['issue']->value['type'];?>
</strong> - <?php if ($_smarty_tpl->tpl_vars['issue']->value['type'] == $_smarty_tpl->tpl_vars['LANG']->value['networkissuestypeserver']) {
echo $_smarty_tpl->tpl_vars['issue']->value['server'];
} else {
echo $_smarty_tpl->tpl_vars['issue']->value['affecting'];
}?></li><?php }?>
            <li class="list-group-item">
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['issue']->value['description'];?>

                </p>
            </li>
            <li class="list-group-item"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkissuesdate'];?>
</strong> - <?php echo $_smarty_tpl->tpl_vars['issue']->value['startdate'];
if ($_smarty_tpl->tpl_vars['issue']->value['enddate']) {?> - <?php echo $_smarty_tpl->tpl_vars['issue']->value['enddate'];
}?></li>
            <li class="list-group-item"><strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['networkissueslastupdated'];?>
</strong> - <?php echo $_smarty_tpl->tpl_vars['issue']->value['lastupdate'];?>
</li>
        </ul>
    </div>

<?php
}
if ($_smarty_tpl->tpl_vars['issue']->do_else) {
?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['noissuesmsg']->value,'textcenter'=>true), 0, true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<div class="btn-group">
    <a href="<?php if ($_smarty_tpl->tpl_vars['prevpage']->value) {
echo $_SERVER['PHP_SELF'];?>
?<?php if ($_smarty_tpl->tpl_vars['view']->value) {?>view=<?php echo $_smarty_tpl->tpl_vars['view']->value;?>
&amp;<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['prevpage']->value;
} else { ?>#<?php }?>" class="btn btn-default <?php if (!$_smarty_tpl->tpl_vars['prevpage']->value) {?>disabled<?php }?>">&lt; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['previouspage'];?>
</a>
    <a href="<?php if ($_smarty_tpl->tpl_vars['nextpage']->value) {
echo $_SERVER['PHP_SELF'];?>
?<?php if ($_smarty_tpl->tpl_vars['view']->value) {?>view=<?php echo $_smarty_tpl->tpl_vars['view']->value;?>
&amp;<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;
} else { ?>#<?php }?>" class="btn btn-default <?php if (!$_smarty_tpl->tpl_vars['nextpage']->value) {?>disabled<?php }?>"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['nextpage'];?>
 &gt;</a>
</div>

<?php if ($_smarty_tpl->tpl_vars['servers']->value) {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['LANG']->value['serverstatustitle']), 0, true);
?>

    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusheadingtext'];?>
</p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['servername'];?>
</th>
                    <th class="text-center">HTTP</th>
                    <th class="text-center">FTP</th>
                    <th class="text-center">POP3</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusphpinfo'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusserverload'];?>
</th>
                    <th class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusuptime'];?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servers']->value, 'server', false, 'num');
$_smarty_tpl->tpl_vars['server']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['server']->value['name'];?>
</td>
                        <td class="text-center" id="port80_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                            <span class="fas fa-spinner fa-spin"></span>
                        </td>
                        <td class="text-center" id="port21_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                            <span class="fas fa-spinner fa-spin"></span>
                        </td>
                        <td class="text-center" id="port110_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                            <span class="fas fa-spinner fa-spin"></span>
                        </td>
                        <td class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['server']->value['phpinfourl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusphpinfo'];?>
</a></td>
                        <td class="text-center" id="load<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                            <span class="fas fa-spinner fa-spin"></span>
                        </td>
                        <td class="text-center" id="uptime<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">
                            <span class="fas fa-spinner fa-spin"></span>
                            <?php echo '<script'; ?>
>
                            jQuery(document).ready(function() {
                                checkPort(<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
, 80);
                                checkPort(<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
, 21);
                                checkPort(<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
, 110);
                                getStats(<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
);
                            });
                            <?php echo '</script'; ?>
>
                        </td>
                    </tr>
                <?php
}
if ($_smarty_tpl->tpl_vars['server']->do_else) {
?>
                    <tr>
                        <td colspan="7"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['serverstatusnoservers'];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>

<?php }
}
}

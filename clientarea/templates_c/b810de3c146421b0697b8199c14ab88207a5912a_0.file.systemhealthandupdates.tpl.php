<?php
/* Smarty version 3.1.36, created on 2022-12-11 20:49:28
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/admin/templates/blend/systemhealthandupdates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_639642588a2a02_59243651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b810de3c146421b0697b8199c14ab88207a5912a' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/admin/templates/blend/systemhealthandupdates.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639642588a2a02_59243651 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="system-health-export-buttons clearfix hidden-xs">
    <a href="systemhealthandupdates.php?export=json" class="btn btn-link pull-right">
        <i class="fas fa-code fa-fw"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.exportAsJson"),$_smarty_tpl ) );?>

    </a>
    <a href="systemhealthandupdates.php?export=text" class="btn btn-link pull-right">
        <i class="far fa-file-alt fa-fw"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.exportAsText"),$_smarty_tpl ) );?>

    </a>
</div>

<div class="health-status-blocks">
    <div class="row health-status-col-margin">
        <div class="col-sm-4">
            <div class="health-status-block health-status-block-success clearfix">
                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="detail">
                    <span class="count"><?php echo $_smarty_tpl->tpl_vars['successfulChecks']->value;?>
</span>
                    <span class="desc"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.successfulChecks"),$_smarty_tpl ) );?>
</span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="health-status-block health-status-block-warning clearfix">
                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="detail">
                    <span class="count"><?php echo $_smarty_tpl->tpl_vars['warningChecks']->value;?>
</span>
                    <span class="desc"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.warningChecks"),$_smarty_tpl ) );?>
</span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="health-status-block health-status-block-danger clearfix">
                <div class="icon">
                    <i class="fas fa-times"></i>
                </div>
                <div class="detail">
                    <span class="count"><?php echo $_smarty_tpl->tpl_vars['dangerChecks']->value;?>
</span>
                    <span class="desc"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.dangerChecks"),$_smarty_tpl ) );?>
</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row health-status-col-margin">
    <div class="health-status-col health-status-col-danger">

        <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel panel-health-check panel-health-check-danger">
            <div class="panel-heading">
                <i class="fas fa-times-circle"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.dangerChecks"),$_smarty_tpl ) );?>

                <span class="pull-right clickable">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                </span>
            </div>
            <div class="panel-body">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['checks']->value['danger'], 'check', false, 'id');
$_smarty_tpl->tpl_vars['check']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['check']->value) {
$_smarty_tpl->tpl_vars['check']->do_else = false;
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getTitle();?>

                        </div>
                        <div class="panel-body">
                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getBody();?>

                        </div>
                    </div>
                <?php
}
if ($_smarty_tpl->tpl_vars['check']->do_else) {
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel">
                        <div class="panel-heading">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.noChecksFailedTitle"),$_smarty_tpl ) );?>

                        </div>
                        <div class="panel-body">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.noDangerChecksFailedDesc"),$_smarty_tpl ) );?>

                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>
        </div>
    </div>
    <div class="health-status-col">

        <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel panel-health-check panel-health-check-warning">
            <div class="panel-heading">
                <i class="fas fa-exclamation-triangle"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.warningChecks"),$_smarty_tpl ) );?>

                <span class="pull-right clickable">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                </span>
            </div>
            <div class="panel-body">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['checks']->value['warning'], 'check', false, 'id');
$_smarty_tpl->tpl_vars['check']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['check']->value) {
$_smarty_tpl->tpl_vars['check']->do_else = false;
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel">
                        <div class="panel-heading">
                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getTitle();?>

                        </div>
                        <div class="panel-body">
                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getBody();?>

                        </div>
                    </div>
                <?php
}
if ($_smarty_tpl->tpl_vars['check']->do_else) {
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel">
                        <div class="panel-heading">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.noChecksFailedTitle"),$_smarty_tpl ) );?>

                        </div>
                        <div class="panel-body">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.noWarningChecksFailedDesc"),$_smarty_tpl ) );?>

                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>
        </div>
    </div>
    <div class="health-status-col health-status-col-success">

        <div class="panel panel-health-check panel-health-check-success">
            <div class="panel-heading">
                <i class="fas fa-check"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.successfulChecks"),$_smarty_tpl ) );?>

                <span class="pull-right clickable">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                </span>
            </div>
            <div class="panel-body">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['checks']->value['success'], 'check', false, 'id');
$_smarty_tpl->tpl_vars['check']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['check']->value) {
$_smarty_tpl->tpl_vars['check']->do_else = false;
?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="panel">
                        <div class="panel-heading">
                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getTitle();?>

                        </div>
                        <div class="panel-body">
                            <?php echo $_smarty_tpl->tpl_vars['check']->value->getBody();?>

                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>
        </div>
    </div>
</div>

<div class="text-center visible-xs">
    <a href="systemhealthandupdates.php?export=json" class="btn btn-link">
        <i class="fas fa-code fa-fw"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.exportAsJson"),$_smarty_tpl ) );?>

    </a>
    <a href="systemhealthandupdates.php?export=text" class="btn btn-link">
        <i class="far fa-file-alt fa-fw"></i>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"healthCheck.exportAsText"),$_smarty_tpl ) );?>

    </a>
</div>
<?php }
}

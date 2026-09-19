<?php
/* Smarty version 3.1.36, created on 2022-11-04 17:08:45
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/supportticketsubmit-confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6365471ddec649_16491779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e3d43b8a0d87f07a27d61f6df44d0978688cbda' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/supportticketsubmit-confirm.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6365471ddec649_16491779 (Smarty_Internal_Template $_smarty_tpl) {
?><br />

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">

        <div class="alert alert-success text-center">
            <strong>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsticketcreated'];?>

                <a id="ticket-number" href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="alert-link">#<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
</a>
            </strong>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketsticketcreateddesc'];?>
</p>
            </div>
        </div>

        <br />

        <p class="text-center">
            <a href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="btn btn-default">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['continue'];?>

                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </p>

        <br />
        <br />
        <br />

    </div>
</div>
<?php }
}

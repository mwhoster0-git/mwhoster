<?php
/* Smarty version 3.1.36, created on 2022-11-10 20:48:34
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomaincontactinfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636d63a242b941_64092470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fa2d1551db3ca16961a1a3e949fd019baf6d66d' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadomaincontactinfo.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636d63a242b941_64092470 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactinfo'];?>
</h3>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['whoisContactWarning']), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['successful']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'],'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['pending']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['pendingMessage']->value,'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['domainInformation']->value && !$_smarty_tpl->tpl_vars['pending']->value && $_smarty_tpl->tpl_vars['domainInformation']->value->getIsIrtpEnabled() && $_smarty_tpl->tpl_vars['domainInformation']->value->isContactChangePending()) {?>
    <?php if ($_smarty_tpl->tpl_vars['domainInformation']->value->getPendingSuspension()) {?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>"<strong>".((string)$_smarty_tpl->tpl_vars['LANG']->value['domains']['verificationRequired'])."</strong><br>".((string)$_smarty_tpl->tpl_vars['LANG']->value['domains']['newRegistration']),'textcenter'=>true), 0, true);
?>
    <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>"<strong>".((string)$_smarty_tpl->tpl_vars['LANG']->value['domains']['contactChangePending'])."</strong><br>".((string)$_smarty_tpl->tpl_vars['LANG']->value['domains']['contactsChanged']),'textcenter'=>true), 0, true);
?>
    <?php }
}?>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['error']->value,'textcenter'=>true), 0, true);
}?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=domaincontacts" id="frmDomainContactModification">

    <input type="hidden" name="sub" value="save" />
    <input type="hidden" name="domainid" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />

    <div class="row">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contactdetails']->value, 'values', false, 'contactdetail', 'contactdetails', array (
));
$_smarty_tpl->tpl_vars['values']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contactdetail']->value => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->do_else = false;
?>

            <div class="col-md-6">

                <h4><?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['supportticketscontact'];?>
</h4>

                <div class="radio">
                    <label>
                        <input type="radio" name="wc[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
1" value="contact" onclick="useDefaultWhois(this.id)" />
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactusexisting'];?>

                    </label>
                </div>

                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10">
                        <div class="form-group">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactchoose'];?>
</label>
                            <input type="hidden" name="sel[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" value="">
                            <select id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
3" class="form-control <?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
defaultwhois" name="sel[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" disabled>
                                <option value="u<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactprimary'];?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact', false, 'num');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                                    <option value="c<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="wc[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
2" value="custom" onclick="useCustomWhois(this.id)" checked />
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactusecustom'];?>

                    </label>
                </div>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['values']->value, 'value', false, 'name');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <div class="form-group">
                        <label><?php echo $_smarty_tpl->tpl_vars['contactdetailstranslations']->value[$_smarty_tpl->tpl_vars['name']->value];?>
</label>
                        <input type="text" name="contactdetails[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" data-original-value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" class="form-control <?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
customwhois<?php if (array_key_exists($_smarty_tpl->tpl_vars['contactdetail']->value,$_smarty_tpl->tpl_vars['irtpFields']->value) && in_array($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl->tpl_vars['irtpFields']->value[$_smarty_tpl->tpl_vars['contactdetail']->value])) {?> irtp-field<?php }?>" />
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>

    <br />

    <p class="text-center">
        <?php if ($_smarty_tpl->tpl_vars['domainInformation']->value && $_smarty_tpl->tpl_vars['irtpFields']->value) {?>
            <input id="irtpOptOut" type="hidden" name="irtpOptOut" value="0">
            <input id="irtpOptOutReason" type="hidden" name="irtpOptOutReason" value="">
        <?php }?>
        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" />
        <input type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacancel'];?>
" class="btn btn-default" />
    </p>

</form>
<?php if ($_smarty_tpl->tpl_vars['domainInformation']->value && $_smarty_tpl->tpl_vars['irtpFields']->value) {?>
    <?php echo '<script'; ?>
 type="text/javascript">
        var allowSubmit = 0;
    <?php echo '</script'; ?>
>
    <div class="modal fade" id="modalIRTPConfirmation" role="dialog" aria-labelledby="IRTPConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel panel-primary">
                <div id="modalIRTPConfirmationHeading" class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.close'),$_smarty_tpl ) );?>
</span>
                    </button>
                    <h4 class="modal-title" id="IRTPConfirmationLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domains.importantReminder'),$_smarty_tpl ) );?>
</h4>
                </div>
                <div id="modalIRTPConfirmationBody" class="modal-body panel-body text-center">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domains.irtpNotice'),$_smarty_tpl ) );?>

                        </div>
                        <div class="col-sm-12">
                            <div class="checkbox-inline">
                                <label for="modalIrtpOptOut">
                                    <input id="modalIrtpOptOut" class="checkbox" type="checkbox" value="1">
                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domains.optOut'),$_smarty_tpl ) );?>

                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <label for="modalReason"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domains.optOutReason'),$_smarty_tpl ) );?>
</label>:
                                </div>
                                <div class="col-sm-12">
                                    <input id="modalReason" type="text" class="form-control input-600" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modalIRTPConfirmationFooter" class="modal-footer panel-footer">
                    <button type="button" id="IRTPConfirmation-Submit" class="btn btn-primary" onclick="irtpSubmit();return false;">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketsubmit'),$_smarty_tpl ) );?>

                    </button>
                    <button type="button" id="IRTPConfirmation-Cancel" class="btn btn-default" data-dismiss="modal">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancel'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<?php }
}

<?php
/* Smarty version 3.1.36, created on 2022-12-07 09:04:10
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/account-contacts-manage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6390570ae66c92_80994525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'badd731765c86ab44c6ab5b13e51ad7017ec8d99' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/account-contacts-manage.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6390570ae66c92_80994525 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['errorMessageHtml']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errorMessageHtml']->value), 0, true);
}?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>

<div class="alert alert-block alert-info">
    <form class="form-horizontal" role="form" method="post" action="<?php echo routePath('account-contacts');?>
">
        <div class="row">
            <label for="inputContactId" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareachoosecontact'];?>
</label>
            <div class="col-sm-6">
                <select name="contactid" id="inputContactId" onchange="submit()" class="form-control">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['contact']->value['id'] == $_smarty_tpl->tpl_vars['contactid']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <option value="new"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavaddcontact'];?>
</option>
                </select>
            </div>
            <div class="col-sm-2 hidden-xs">
                <button type="submit" class="btn btn-default btn-block"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['go'];?>
</button>
            </div>
        </div>
    </form>
</div>

<form role="form" method="post" action="<?php echo routePath('account-contacts-save');?>
">
    <input type="hidden" name="contactid" value="<?php echo $_smarty_tpl->tpl_vars['contactid']->value;?>
" />

    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                <label for="inputFirstName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
</label>
                <input type="text" name="firstname" id="inputFirstName" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['firstname'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputLastName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
</label>
                <input type="text" name="lastname" id="inputLastName" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['lastname'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputCompanyName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
</label>
                <input type="text" name="companyname" id="inputCompanyName" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['companyname'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
                <input type="email" name="email" id="inputEmail" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['email'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputPhone" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
</label>
                <input type="tel" name="phonenumber" id="inputPhone" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['phonenumber'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputTaxId" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>$_smarty_tpl->tpl_vars['taxIdLabel']->value),$_smarty_tpl ) );?>
</label>
                <input type="text" name="tax_id" id="inputTaxId" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['tax_id'];?>
" />
            </div>

        </div>
        <div class="col-sm-6 col-xs-12 pull-right">

            <div class="form-group">
                <label for="inputAddress1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
</label>
                <input type="text" name="address1" id="inputAddress1" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['address1'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputAddress2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
</label>
                <input type="text" name="address2" id="inputAddress2" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['address2'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputCity" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
</label>
                <input type="text" name="city" id="inputCity" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['city'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputState" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
</label>
                <input type="text" name="state" id="inputState" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['state'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputPostcode" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
</label>
                <input type="text" name="postcode" id="inputPostcode" value="<?php echo $_smarty_tpl->tpl_vars['formdata']->value['postcode'];?>
" class="form-control" />
            </div>

            <div class="form-group">
                <label class="control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
</label>
                <?php echo $_smarty_tpl->tpl_vars['countriesdropdown']->value;?>

            </div>

        </div>
    </div>

    <div class="form-group">
        <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacontactsemails'];?>
</h3>
        <div class="controls checkbox">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['formdata']->value['emailPreferences'], 'value', false, 'emailType');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emailType']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <label>
                <input type="hidden" name="email_preferences[<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
]" value="0">
                <input type="checkbox" name="email_preferences[<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
emails" value="1"<?php if ($_smarty_tpl->tpl_vars['value']->value) {?> checked="checked"<?php }?> />
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>("clientareacontactsemails").($_smarty_tpl->tpl_vars['emailType']->value)),$_smarty_tpl ) );?>

                </label><?php if (!($_smarty_tpl->tpl_vars['emailType']->last)) {?><br /><?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <div class="form-group text-center">
        <input class="btn btn-primary" type="submit" name="save" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
        <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteContact"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareadeletecontact'),$_smarty_tpl ) );?>
</button>
    </div>

</form>

<form method="post" action="<?php echo routePath('account-contacts-delete');?>
">
    <input type="hidden" name="contactid" value="<?php echo $_smarty_tpl->tpl_vars['contactid']->value;?>
">
    <div class="modal fade" id="modalDeleteContact">
        <div class="modal-dialog">
            <div class="modal-content panel-primary">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareadeletecontact"),$_smarty_tpl ) );?>

                    </h4>
                </div>
                <div class="modal-body">
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"clientareadeletecontactareyousure"),$_smarty_tpl ) );?>
</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"cancel"),$_smarty_tpl ) );?>

                    </button>
                    <button type="submit" class="btn btn-primary" id="btnCancelInviteConfirm">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"confirm"),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }
}

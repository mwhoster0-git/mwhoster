<?php
/* Smarty version 3.1.36, created on 2022-11-04 03:36:51
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadetails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636488d3c2ef52_98538828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79e29ab59e907955fa4a0330576ffe89c30ad2f9' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/clientareadetails.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636488d3c2ef52_98538828 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['successful']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"success",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'],'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
}?>

<?php if (in_array('state',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>
    <?php echo '<script'; ?>
>
        var stateNotRequired = true;
    <?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>

<form method="post" action="?action=details" role="form">

    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                <label for="inputFirstName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
</label>
                <input type="text" name="firstname" id="inputFirstName" value="<?php echo $_smarty_tpl->tpl_vars['clientfirstname']->value;?>
"<?php if (in_array('firstname',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputLastName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
</label>
                <input type="text" name="lastname" id="inputLastName" value="<?php echo $_smarty_tpl->tpl_vars['clientlastname']->value;?>
"<?php if (in_array('lastname',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputCompanyName" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
</label>
                <input type="text" name="companyname" id="inputCompanyName" value="<?php echo $_smarty_tpl->tpl_vars['clientcompanyname']->value;?>
"<?php if (in_array('companyname',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
                <input type="email" name="email" id="inputEmail" value="<?php echo $_smarty_tpl->tpl_vars['clientemail']->value;?>
"<?php if (in_array('email',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

        </div>
        <div class="col-sm-6 pull-sm-right">

            <div class="form-group">
                <label for="inputAddress1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
</label>
                <input type="text" name="address1" id="inputAddress1" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress1']->value;?>
"<?php if (in_array('address1',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputAddress2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
</label>
                <input type="text" name="address2" id="inputAddress2" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress2']->value;?>
"<?php if (in_array('address2',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputCity" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
</label>
                <input type="text" name="city" id="inputCity" value="<?php echo $_smarty_tpl->tpl_vars['clientcity']->value;?>
"<?php if (in_array('city',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputState" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
</label>
                <input type="text" name="state" id="inputState" value="<?php echo $_smarty_tpl->tpl_vars['clientstate']->value;?>
"<?php if (in_array('state',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label for="inputPostcode" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
</label>
                <input type="text" name="postcode" id="inputPostcode" value="<?php echo $_smarty_tpl->tpl_vars['clientpostcode']->value;?>
"<?php if (in_array('postcode',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> class="form-control" />
            </div>

            <div class="form-group">
                <label class="control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
</label>
                <?php echo $_smarty_tpl->tpl_vars['clientcountriesdropdown']->value;?>

            </div>

            <div class="form-group">
                <label for="inputPhone" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
</label>
                <input type="tel" name="phonenumber" id="inputPhone" value="<?php echo $_smarty_tpl->tpl_vars['clientphonenumber']->value;?>
"<?php if (in_array('phonenumber',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled=""<?php }?> class="form-control" />
            </div>

        </div>
        <div class="col-sm-6 pull-sm-left">

            <div class="form-group">
                <label for="inputPaymentMethod" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['paymentmethod'];?>
</label>
                <select name="paymentmethod" id="inputPaymentMethod" class="form-control">
                    <option value="none"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['paymentmethoddefault'];?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paymentmethods']->value, 'method');
$_smarty_tpl->tpl_vars['method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['method']->value) {
$_smarty_tpl->tpl_vars['method']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['method']->value['sysname'];?>
"<?php if ($_smarty_tpl->tpl_vars['method']->value['sysname'] == $_smarty_tpl->tpl_vars['defaultpaymentmethod']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['method']->value['name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label for="inputBillingContact" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['defaultbillingcontact'];?>
</label>
                <select name="billingcid" id="inputBillingContact" class="form-control">
                    <option value="0"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['usedefaultcontact'];?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['contact']->value['id'] == $_smarty_tpl->tpl_vars['billingcid']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label for="inputLanguage" class="col-form-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealanguage'];?>
</label>
                <select name="accountLanguage" id="inputAccountLanguage" class="form-control"
                    <?php if (in_array('language',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?>>
                    <option value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'default'),$_smarty_tpl ) );?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['language']->value == $_smarty_tpl->tpl_vars['clientLanguage']->value) {?> selected="selected"<?php }?>
                        ><?php echo ucfirst($_smarty_tpl->tpl_vars['language']->value);?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['showTaxIdField']->value) {?>
                <div class="form-group">
                    <label for="inputTaxId" class="control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>$_smarty_tpl->tpl_vars['taxIdLabel']->value),$_smarty_tpl ) );?>
</label>
                    <input type="text" name="tax_id" id="inputTaxId" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['clientTaxId']->value;?>
"<?php if (in_array('tax_id',$_smarty_tpl->tpl_vars['uneditablefields']->value)) {?> disabled="disabled"<?php }?> />
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield', false, 'num');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
                    <div class="form-group">
                        <label class="control-label" for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
                        <div class="control">
                            <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>
 <?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>

                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['emailPreferencesEnabled']->value) {?>
            <div class="col-sm-12">
                <div class="form-group">
                    <h3><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacontactsemails'];?>
</h3>
                    <div class="controls checkbox">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emailPreferences']->value, 'value', false, 'emailType');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emailType']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                            <label>
                                <input type="hidden" name="email_preferences[<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
]" value="0">
                                <input type="checkbox" name="email_preferences[<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['emailType']->value;?>
Emails" value="1"<?php if ($_smarty_tpl->tpl_vars['value']->value) {?> checked="checked"<?php }?> />
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>("emailPreferences.").($_smarty_tpl->tpl_vars['emailType']->value)),$_smarty_tpl ) );?>

                            </label><?php if (!($_smarty_tpl->tpl_vars['emailType']->last)) {?><br /><?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['showMarketingEmailOptIn']->value) {?>
        <div class="marketing-email-optin">
            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'emailMarketing.joinOurMailingList'),$_smarty_tpl ) );?>
</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['marketingEmailOptInMessage']->value;?>
</p>
            <input type="checkbox" name="marketingoptin" value="1"<?php if ($_smarty_tpl->tpl_vars['marketingEmailOptIn']->value) {?> checked<?php }?> class="no-icheck toggle-switch-success" data-size="small" data-on-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'yes'),$_smarty_tpl ) );?>
" data-off-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'no'),$_smarty_tpl ) );?>
">
        </div>
    <?php }?>

    <div class="form-group text-center">
        <input class="btn btn-primary" type="submit" name="save" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" />
        <input class="btn btn-default" type="reset" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cancel'];?>
" />
    </div>

</form>
<?php }
}

<?php
/* Smarty version 3.1.36, created on 2022-11-06 05:44:58
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/upgrade.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_636749da40ba21_48698032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd30c295d6c54cb393dd83846e53fb66189e1f23f' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/upgrade.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636749da40ba21_48698032 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['overdueinvoice']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['upgradeerroroverdueinvoice']), 0, true);
} elseif ($_smarty_tpl->tpl_vars['existingupgradeinvoice']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['upgradeexistingupgradeinvoice']), 0, true);
} elseif ($_smarty_tpl->tpl_vars['upgradenotavailable']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"warning",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['upgradeNotPossible'],'textcenter'=>true), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['overdueinvoice']->value) {?>

    <p>
        <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
    </p>

<?php } elseif ($_smarty_tpl->tpl_vars['existingupgradeinvoice']->value) {?>

    <p>
        <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
        <a href="submitticket.php" class="btn btn-default btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['submitticketdescription'];?>
</a>
    </p>

<?php } elseif ($_smarty_tpl->tpl_vars['upgradenotavailable']->value) {?>

    <p>
        <a href="clientarea.php?action=productdetails&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-default btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
        <a href="submitticket.php" class="btn btn-default btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['submitticketdescription'];?>
</a>
    </p>

<?php } else { ?>

    <?php if ($_smarty_tpl->tpl_vars['type']->value == "package") {?>

        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradechoosepackage'];?>
</p>

        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradecurrentconfig'];?>
:<br/><strong><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['productname']->value;?>
</strong><?php if ($_smarty_tpl->tpl_vars['domain']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
)<?php }?></p>

        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradenewconfig'];?>
:</p>

        <table class="table table-striped">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upgradepackages']->value, 'upgradepackage', false, 'num');
$_smarty_tpl->tpl_vars['upgradepackage']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['upgradepackage']->value) {
$_smarty_tpl->tpl_vars['upgradepackage']->do_else = false;
?>
                <tr>
                    <td>
                        <strong>
                            <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['groupname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['name'];?>

                        </strong>
                        <br />
                        <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['description'];?>

                    </td>
                    <td width="300" class="text-center">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
                            <input type="hidden" name="step" value="2">
                            <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pid'];?>
">
                            <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "free") {?>
                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfree'];?>
<br />
                                    <input type="hidden" name="billingcycle" value="free">
                                <?php } elseif ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "onetime") {?>
                                    <?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['onetime'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermonetime'];?>

                                    <input type="hidden" name="billingcycle" value="onetime">
                                <?php } elseif ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['type'] == "recurring") {?>
                                    <select name="billingcycle" class="form-control">
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['monthly']) {?><option value="monthly"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['monthly'];?>
</option><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['quarterly']) {?><option value="quarterly"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['quarterly'];?>
</option><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['semiannually']) {?><option value="semiannually"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['semiannually'];?>
</option><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['annually']) {?><option value="annually"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['annually'];?>
</option><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['biennially']) {?><option value="biennially"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['biennially'];?>
</option><?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['triennially']) {?><option value="triennially"><?php echo $_smarty_tpl->tpl_vars['upgradepackage']->value['pricing']['triennially'];?>
</option><?php }?>
                                    </select>
                                <?php }?>
                            </div>
                            <input type="submit"
                                   value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradedowngradechooseproduct'];?>
"
                                   class="btn btn-primary btn-block"
                                   id="btnUpgradeDowngradeChooseProduct"
                            />
                        </form>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>

    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "configoptions") {?>

        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradechooseconfigoptions'];?>
</p>

        <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
?>
        <?php }?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
            <input type="hidden" name="step" value="2" />
            <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradecurrentconfig'];?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradenewconfig'];?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoptions']->value, 'configoption', false, 'num');
$_smarty_tpl->tpl_vars['configoption']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['configoption']->value) {
$_smarty_tpl->tpl_vars['configoption']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 1 || $_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 2) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedname'];?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 3) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {
echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['no'];
}?>
                                <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 4) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
 x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                <?php }?>
                            </td>
                            <td>=></td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 1 || $_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 2) {?>
                                    <select name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['configoption']->value['options'], 'option', false, 'num');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['option']->value['selected']) {?><option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradenochange'];?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['nameonly'];?>
 <?php echo $_smarty_tpl->tpl_vars['option']->value['price'];
}?></option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 3) {?>
                                    <input type="checkbox" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="1"<?php if ($_smarty_tpl->tpl_vars['configoption']->value['selectedqty']) {?> checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['configoption']->value['optiontype'] == 4) {?>
                                    <input type="text" name="configoption[<?php echo $_smarty_tpl->tpl_vars['configoption']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['configoption']->value['selectedqty'];?>
" size="5"> x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['options'][0]['name'];?>

                                <?php }?>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

            <p class="text-center">
                <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordercontinuebutton'];?>
" class="btn btn-primary" />
            </p>

        </form>
    <?php }
}
}
}

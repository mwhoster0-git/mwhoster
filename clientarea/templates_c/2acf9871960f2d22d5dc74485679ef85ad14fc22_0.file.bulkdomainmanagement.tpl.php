<?php
/* Smarty version 3.1.36, created on 2024-03-11 14:12:19
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/bulkdomainmanagement.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_65ef1143c37948_95747869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2acf9871960f2d22d5dc74485679ef85ad14fc22' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/bulkdomainmanagement.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ef1143c37948_95747869 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=bulkdomain" class="form-horizontal">
    <input type="hidden" name="update" value="<?php echo $_smarty_tpl->tpl_vars['update']->value;?>
">
    <input type="hidden" name="save" value="1">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domainids']->value, 'domainid');
$_smarty_tpl->tpl_vars['domainid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['domainid']->value) {
$_smarty_tpl->tpl_vars['domainid']->do_else = false;
?>
    <input type="hidden" name="domids[]" value="<?php echo $_smarty_tpl->tpl_vars['domainid']->value;?>
" />
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->tpl_vars['update']->value == "nameservers") {?>

    <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
        <div class="alert alert-error">
            <p class="bold">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaerrors'];?>

            </p>
            <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <?php } else { ?>
        <div class="alert alert-success">
            <p>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'];?>

            </p>
        </div>
        <?php }?>
    <?php }?>

    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainbulkmanagementchangesaffect'];?>

    </p>

    <br />

    <blockquote>
        <br />
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain');
$_smarty_tpl->tpl_vars['domain']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['domain']->value) {
$_smarty_tpl->tpl_vars['domain']->do_else = false;
?>
        &raquo; <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<br />
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <br />
    </blockquote>

    <p>
        <label class="full control-label"><input type="radio" class="radio inline" name="nschoice" value="default" onclick="disableFields('domnsinputs',true)" checked /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['nschoicedefault'];?>
</label>
        <br />
        <label class="full control-label"><input type="radio" class="radio inline" name="nschoice" value="custom" onclick="disableFields('domnsinputs','')" checked /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['nschoicecustom'];?>
</label>
    </p>

    <fieldset class="control-group">
        <div class="control-group">
            <label class="control-label" for="ns1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver1'];?>
</label>
            <div class="controls">
                <input class="input-xlarge domnsinputs" id="ns1" name="ns1" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ns1']->value;?>
" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="ns2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver2'];?>
</label>
            <div class="controls">
                <input class="input-xlarge domnsinputs" id="ns2" name="ns2" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ns2']->value;?>
" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="ns3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver3'];?>
</label>
            <div class="controls">
                <input class="input-xlarge domnsinputs" id="ns3" name="ns3" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ns3']->value;?>
" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="ns4"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver4'];?>
</label>
            <div class="controls">
                <input class="input-xlarge domnsinputs" id="ns4" name="ns4" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ns4']->value;?>
" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="ns5"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver5'];?>
</label>
            <div class="controls">
                <input class="input-xlarge domnsinputs" id="ns5" name="ns5" type="text" value="<?php echo $_smarty_tpl->tpl_vars['ns5']->value;?>
" />
            </div>
        </div>
        <p align="center">
            <input type="submit" class="btn btn-primary btn-large" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['changenameservers'];?>
" />
        </p>
    </fieldset>

    <?php } elseif ($_smarty_tpl->tpl_vars['update']->value == "autorenew") {?>

    <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
    <div class="alert alert-success">
        <p>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'];?>

        </p>
    </div>
    <?php }?>

    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainautorenewinfo'];?>

    </p>
    <br />
    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainautorenewrecommend'];?>

    </p>
    <br />
    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainbulkmanagementchangeaffect'];?>

    </p>

    <br />

    <blockquote>
        <br />
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain');
$_smarty_tpl->tpl_vars['domain']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['domain']->value) {
$_smarty_tpl->tpl_vars['domain']->do_else = false;
?>
        &raquo; <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<br />
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <br />
    </blockquote>

    <br />

    <p align="center">
        <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainsautorenewenable'];?>
" class="btn btn-success btn-large" /> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="disable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainsautorenewdisable'];?>
" class="btn btn-danger btn-large" />
    </p>

    <?php } elseif ($_smarty_tpl->tpl_vars['update']->value == "reglock") {?>

    <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
        <div class="alert alert-error">
            <p class="bold">
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaerrors'];?>

            </p>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <?php } else { ?>
        <div class="alert alert-success">
            <p>
                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'];?>

            </p>
        </div>
        <?php }?>
    <?php }?>

    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainreglockinfo'];?>

    </p>
    <br />
    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainreglockrecommend'];?>

    </p>
    <br />
    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainbulkmanagementchangeaffect'];?>

    </p>

    <blockquote>
        <br />
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain');
$_smarty_tpl->tpl_vars['domain']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['domain']->value) {
$_smarty_tpl->tpl_vars['domain']->do_else = false;
?>
        &raquo; <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<br />
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <br />
    </blockquote>

    <br />

    <p align="center">
        <input type="submit" name="enable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainreglockenable'];?>
" class="btn btn-success btn-large" /> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="disable" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainreglockdisable'];?>
" class="btn btn-danger btn-large" />
    </p>

    <?php } elseif ($_smarty_tpl->tpl_vars['update']->value == "contactinfo") {?>

    <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
            <div class="alert alert-error">
                <p class="bold">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaerrors'];?>

                </p>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        <?php } else { ?>
            <div class="alert alert-success">
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['changessavedsuccessfully'];?>

                </p>
            </div>
        <?php }?>
    <?php }?>

    
    <?php echo '<script'; ?>
 language="javascript">
    function usedefaultwhois(id) {
        jQuery("."+id.substr(0,id.length-1)+"customwhois").attr("disabled", true);
        jQuery("."+id.substr(0,id.length-1)+"defaultwhois").attr("disabled", false);
        jQuery('#'+id.substr(0,id.length-1)+'1').attr("checked", "checked");
    }
    function usecustomwhois(id) {
        jQuery("."+id.substr(0,id.length-1)+"customwhois").attr("disabled", false);
        jQuery("."+id.substr(0,id.length-1)+"defaultwhois").attr("disabled", true);
        jQuery('#'+id.substr(0,id.length-1)+'2').attr("checked", "checked");
    }
    <?php echo '</script'; ?>
>
    

    <p>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainbulkmanagementchangesaffect'];?>

    </p>

    <br />

    <blockquote>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain');
$_smarty_tpl->tpl_vars['domain']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['domain']->value) {
$_smarty_tpl->tpl_vars['domain']->do_else = false;
?>
        &raquo; <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<br />
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </blockquote>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contactdetails']->value, 'values', false, 'contactdetail', 'contactdetails', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['values']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contactdetail']->value => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_contactdetails']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_contactdetails']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_contactdetails']->value['index'];
?>

    <h3>
        <a name="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
"></a><?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
</strong><?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_contactdetails']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_contactdetails']->value['first'] : null)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contactdetails']->value, 'valuesx', false, 'contactdetailx', 'contactsx', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['valuesx']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contactdetailx']->value => $_smarty_tpl->tpl_vars['valuesx']->value) {
$_smarty_tpl->tpl_vars['valuesx']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_contactsx']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_contactsx']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_contactsx']->value['index'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_contactsx']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_contactsx']->value['first'] : null)) {?> - <a href="clientarea.php?action=bulkdomain#<?php echo $_smarty_tpl->tpl_vars['contactdetailx']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['jumpto'];?>
 <?php echo $_smarty_tpl->tpl_vars['contactdetailx']->value;?>
</a><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?> - <a href="clientarea.php?action=bulkdomain#"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['top'];?>
</a><?php }?>
    </h3>

    <p>
    </p>

    <p>
        <label class="full control-label"><input type="radio" class="radio inline" name="wc[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
1" value="contact" onclick="usedefaultwhois(id)" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactusexisting'];?>
</label>
    </p>

    <fieldset class="onecol" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
defaultwhois">

        <div class="control-group">
            <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
3"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactchoose'];?>
</label>
            <div class="controls">
                <select class="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
defaultwhois" name="sel[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
3" onclick="usedefaultwhois(id)">
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

    </fieldset>

    <p>
        <label class="full control-label"><input type="radio" class="radio inline" name="wc[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
]" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
2" value="custom" onclick="usecustomwhois(id)" checked /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincontactusecustom'];?>
</label>
    </p>

    <fieldset class="onecol" id="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
defaultwhois">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['values']->value, 'value', false, 'name');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
        <div class="control-group">
            <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
3"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</label>
            <div class="controls">
                <input type="text" name="contactdetails[<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" size="30" class="<?php echo $_smarty_tpl->tpl_vars['contactdetail']->value;?>
customwhois" />
            </div>
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </fieldset>

    <?php
}
if ($_smarty_tpl->tpl_vars['values']->do_else) {
?>

    <div class="alert alert-error">
        <p>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainbulkmanagementnotpossible'];?>

        </p>
    </div>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <p align="center">
        <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasavechanges'];?>
" class="btn btn-primary" />
    </p>

    <?php }?>

    <p>
        <a href="clientarea.php?action=domains" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareabacklink'];?>
</a>
    </p>

    <br />
    <br />

</form>
<?php }
}

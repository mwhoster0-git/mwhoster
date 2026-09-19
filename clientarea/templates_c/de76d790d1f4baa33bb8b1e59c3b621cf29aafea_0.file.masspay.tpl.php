<?php
/* Smarty version 3.1.36, created on 2022-11-14 04:17:01
  from '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/masspay.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6371c13d7a6481_04233076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de76d790d1f4baa33bb8b1e59c3b621cf29aafea' => 
    array (
      0 => '/home/sites/9a/b/b8e4fafe72/public_html/clientarea/templates/six/masspay.tpl',
      1 => 1655211752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6371c13d7a6481_04233076 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="clientarea.php?action=masspay" class="form-horizontal">
    <input type="hidden" name="geninvoice" value="true" />

    <table class="table">
        <thead>
            <tr>
                <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicesdescription'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicesamount'];?>
</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoiceitems']->value, 'invoiceitem', false, 'invid');
$_smarty_tpl->tpl_vars['invoiceitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['invid']->value => $_smarty_tpl->tpl_vars['invoiceitem']->value) {
$_smarty_tpl->tpl_vars['invoiceitem']->do_else = false;
?>
                <tr>
                    <td colspan="2" class="bg-info">
                        <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicenumber'];?>
 <?php if ($_smarty_tpl->tpl_vars['invoiceitem']->value[0]['invoicenum']) {
echo $_smarty_tpl->tpl_vars['invoiceitem']->value[0]['invoicenum'];
} else {
echo $_smarty_tpl->tpl_vars['invid']->value;
}?></strong>
                        <input type="hidden" name="invoiceids[]" value="<?php echo $_smarty_tpl->tpl_vars['invid']->value;?>
" />
                    </td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoiceitem']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <tr class="masspay-invoice-detail">
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php
}
if ($_smarty_tpl->tpl_vars['invoiceitem']->do_else) {
?>
                <tr>
                    <td colspan="6" align="center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['norecordsfound'];?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <tr class="masspay-total">
                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicessubtotal'];?>
:</td>
                <td><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['tax']->value) {?>
                <tr class="masspay-total">
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['taxrate1']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname1']->value;?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tax']->value;?>
</td>
                </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['tax2']->value) {?>
                <tr class="masspay-total">
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tax2']->value;?>
</td>
                </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['credit']->value) {?>
                <tr class="masspay-total">
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicescredit'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['credit']->value;?>
</td>
                </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['partialpayments']->value) {?>
                <tr class="masspay-total">
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicespartialpayments'];?>
:</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partialpayments']->value;?>
</td>
                </tr>
            <?php }?>
            <tr class="masspay-total">
                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['invoicestotaldue'];?>
:</td>
                <td><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['masspaymentselectgateway'];?>
</h3>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="paymentmethod" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod'];?>
:</label><br/>
                                <select name="paymentmethod" id="paymentmethod" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gateways']->value, 'gateway');
$_smarty_tpl->tpl_vars['gateway']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gateway']->value) {
$_smarty_tpl->tpl_vars['gateway']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
"><?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>
</option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['masspaymakepayment'];?>
" class="btn btn-primary btn-block" id="btnMassPayMakePayment" />
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

</form>
<?php }
}

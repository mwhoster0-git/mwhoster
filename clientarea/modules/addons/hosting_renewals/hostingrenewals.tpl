<script type="text/javascript" src="includes/jscript/jqueryui.js"></script>
<script type="text/javascript" src="templates/orderforms/modern/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/modern/style.css" />

<form id="order-modern" method="post" action="clientarea.php?action=productdetails&id={$id}">
    <input name="upfrontpayment" type="hidden" value="1" />
    <input type="hidden" name="cycle" value="{$renewal.cycle}" />
    {if $unpaid}
        <div class="text-center mgHrInfoBox">
            <p align="center">
                <h3>{$_lang.unpaidalert}</h3>
                <br />
                <button onclick="window.location.href='viewinvoice.php?id={$unpaid}'; return false;" class="btn btn-primary">{$_lang.paynow}</button>
            </p>
        </div>
    {else}
        <div class="table-container clearfix">
            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer mgHrTable">
                <div class="listtable">
                    <table id="tableServicesList" class="table table-list dataTable no-footer dtr-inline" aria-describedby="tableServicesList_info" role="grid">
                        <thead>
                            <tr role="row">
                                <th colspan="1" style="width: 0px;">{$LANG.orderproduct}</th>
                                <th colspan="1" style="width: 0px;">{$LANG.domainstatus}</th>
                                <th colspan="1" style="width: 0px;">{$LANG.domaindaysuntilexpiry} + <span style="color: #5bb75b">{$_lang.plusdays}</th>
                                <th colspan="1" style="width: 0px;">{$LANG.orderprice}</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr class="odd" role="row">
                                <td class="text-center"><b>{$renewal.name}</b></td>
                                <td class="text-center"><span class="label {if $renewal.status == 'active'}label-success{else}label-default{/if}">{$renewal.textstatus}</span></td>
                                <td class="text-center">{$renewal.daysuntilexpiry} + <span style="color: #5bb75b">{$plusdays}</span></td>
                                <td class="text-center">{$renewal.cycleprice}{if $renewal.promotion} <strong>(*)</strong>{/if}</td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p align="center">
            <input type="submit" value="{$_lang.ordernowbutton}"class="btn btn-success" />
        </p>                            
    {/if}
</form>

<style>
    .mgHrTable .table > thead > tr > th,
    .mgHrTable .table > tbody > tr > td {
        font-size: 15px!important;
        vertical-align: middle;
        padding: 10px!important;
    }
    
    .mgHrTable .table > tbody > tr > td :hover{
        pointer-events: none!important;
    }
    
    .mgHrInfoBox{
        padding-top: 5px;
    }
</style>

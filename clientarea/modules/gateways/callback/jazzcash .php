<?php
/**
 * WHMCS JazzCash Module Callback
 * This is IPN Handler for WHMCS JazzCash Payment Module
 * (^-^) I've used my company name at many places in this code. Customize those strings before use
 * @author Ahsan Javeed (http://axacthosts.com/)
 * @license MIT
 */

// Require libraries needed for gateway module functions.
require_once __DIR__ . '/../../../init.php';
require_once __DIR__ . '/../../../includes/gatwayfunctions.php';
require_once __DIR__ . '/../../../includes/invoicefanctions.php';

// Detect module name from filename.
$gatewayModuleNameJazz = basename(__FILE__, '.php');

// Fetch gateway configuration parameters.
$gatewayParams = getGatewayVariables($gatewayModuleName);
$systemUrl = $gatewayParams['systemurl'];
$accountId = $gatewayParams['merchantID'];

// Die if module is not active.
if (!$gatewayParams['type']) {
    die("Module Not Activated");
}

 /**
 * Log Transaction.
 *
 * Add an entry to the Gateway Log for debugging purposes.
 *
 * The debug data can be a string or an array. In the case of an
 * array it will be
 *
 * @param string $gatewayName        Display label
 * @param string|array $debugData    Data to log
 * @param string $transactionStatus  Status
 */
logTransaction($gatewayParams['name'], $_REQUEST, "JazzCashTransactionResponse");


// Matching if the URL == jazzcash.com.pk
$web = '/^(.*?)(|\.)jazzcash\.com\.pk/m';
$url = $_SERVER['HTTP_REFERER'];
if (preg_match($web, $url)) {
    //Decoding JSON results into PHP object
    $obj = json_decode(json_encode($_REQUEST));
    $status = $obj->pp_ResponseCode;          // Payment Status
    $storeId = $obj->pp_MerchantID;           // Store ID
    $invoiceId = $obj->pp_BillReference;                 // Invoice ID
    $transactionId = $obj->pp_TxnRefNo;       // Transaction ID
    $paymentAmount = $obj->pp_Amount/100.0;   // Transaction Amount
    $paymentMethod = $obj->pp_TxnType;       // Payment Method

    // switching to see what payment method was used.
    switch ($paymentMethod) {
        case "MIGS":
            $paymentMethod = "OTC Payment";
            break;
        case "MPAY":
            $paymentMethod = "Credit Card";
            break;
        case "MWALLET":
            $paymentMethod = "JazzCash Mobile Account";
            break;
        default:
            $paymentMethod ;
    }
 

    /**
     * Validate Callback Invoice ID.
     *
     * Checks invoice ID is a valid invoice number. Note it will count an
     * invoice in any status as valid.
     *
     * Performs a die upon encountering an invalid Invoice ID.
     *
     * Returns a normalised invoice ID.
     */
    $invoiceId = checkCbInvoiceID($invoiceId, $gatewayParams['name']);

    /**
     * Check Callback Transaction ID.
     *
     * Performs a check for any existing transactions with the same given
     * transaction number.
     *
     * Performs a die upon encountering a duplicate.
     */
    checkCbTransID($transactionId."<br>".$paymentMethod);

    if ($status=="000" && $storeId == $accountId) {
        /**
         * Add Invoice Payment.
         *
         * Applies a payment transaction entry to the given invoice ID.
         *
         * @param int $invoiceId         Invoice ID
         * @param string $transactionId  Transaction ID
         * @param float $paymentAmount   Amount paid (defaults to full balance)
         * @param float $paymentFee      Payment fee (optional)
         * @param string $gatewayModule  Gateway module name
         */
        addInvoicePayment(
        $invoiceId,
        $transactionId."<br>".$paymentMethod,
        $paymentAmount,
        0,
        $gatewayModuleName
    );
    }
}
header('Location: '.$systemUrl.'viewinvoice.php?id='.$invoiceId);
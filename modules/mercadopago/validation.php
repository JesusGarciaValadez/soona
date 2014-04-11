<?php
/*
 * Mercadopago Payment Gateway Module for Prestashop
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.5
 */

/**
 * This file is only for Prestashop versions 1.3.x and 1.4.x
 */

require_once(dirname(__FILE__) . '/../../config/config.inc.php');
require_once(dirname(__FILE__) . '/mercadopago.php');

$mercadopago = New Mercadopago();

if (Tools::getValue('cid') && Tools::getValue('tid')) {       //Customer came back from Mercadopago's page after paying
    $cart = New Cart((int)Tools::getValue('cid'));
    $secure_key = property_exists('Cart', 'secure_key') ? $cart->secure_key : 0;    //Hack for early Prestashop 1.3 versions
    if (!property_exists('Cart', 'secure_key') && !isset($cookie)) {                //Hack for early Prestashop 1.3 versions
        $cookie = new stdclass();
        $cookie->id_lang = intval(Configuration::get('PS_LANG_DEFAULT'));
    }
    $mercadopago->id_country = isset($mercadopago->id_country) ? $mercadopago->id_country : (method_exists('Country','getDefaultCountryId') ? (int)Country::getDefaultCountryId() : 0);      //Hack for Prestashop 1.4.1.0 and similar
    $transactionId = mysql_real_escape_string(Tools::getValue('tid'));    //SQL injections? not on MY watch
    if (!$mercadopago->getFieldFromTransactionId($transactionId,'order_id')) {
        $mercadopago->validateOrder($cart->id, Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS'), $cart->getOrderTotal(), 'Mercadopago', $cart->gift_message, array('transaction_id'=>$transactionId), NULL, false, $secure_key);
        $mercadopago->assignOrderToTransaction($cart);
    }
    $orderConfUri = (method_exists('Tools','getShopDomainSsl') ? Tools::getShopDomainSsl(true, true) : Tools::getHttpHost(true, true)) . __PS_BASE_URI__ . "order-confirmation.php?id_cart={$cart->id}&id_module={$mercadopago->id}&id_order={$mercadopago->currentOrder}&key={$secure_key}";
    header('Location: '.$orderConfUri);
exit;
}

if (Tools::getValue('topic') AND Tools::getValue('id') AND Tools::getValue('topic') == 'payment') {    //IPN notification arrived
    $json = $mercadopago->queryTransactionData(Tools::getValue('id'));
    $transactionId = mysql_real_escape_string($json['external_reference']);
    $orderId = $mercadopago->getFieldFromTransactionId($transactionId, 'order_id');
    if (!$orderId) {            //Mercadopago IPN order notification came before customer returned to page
        $cartId = $mercadopago->getFieldFromTransactionId($transactionId, 'cart_id') OR die('Cart not registered');
        $cart = New Cart((int)$cartId);
        $mercadopago->id_country = isset($mercadopago->id_country) ? $mercadopago->id_country : (method_exists('Country','getDefaultCountryId') ? (int)Country::getDefaultCountryId() : 0);      //Hack for Prestashop 1.4.1.0 and similar
        $secure_key = property_exists('Cart', 'secure_key') ? $cart->secure_key : 0;    //Hack for early Prestashop 1.3 versions
        if (!property_exists('Cart', 'secure_key') && !isset($cookie)) {                //Hack for early Prestashop 1.3 versions
            $cookie = new stdclass();
            $cookie->id_lang = intval(Configuration::get('PS_LANG_DEFAULT'));
        }
        $mercadopago->validateOrder($cart->id, Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS'), $cart->getOrderTotal(), 'Mercadopago', $cart->gift_message, array('transaction_id'=>$transactionId), NULL, false, $secure_key);
        $mercadopago->assignOrderToTransaction($cart);
        $orderId = $mercadopago->getFieldFromTransactionId($transactionId, 'order_id');
    }
    $order = new Order($orderId);
    $fee = $mercadopago->getFieldFromTransactionId($transactionId, 'fee');
    $totalToPay = $mercadopago->getTotalWithFee($order->total_paid, $fee);
    switch ($json['status']) {
        case 'in_mediation':
        case 'pending':
        case 'in_process':
        case 'rejected':
            $status = 'Pending';
            break;
        case 'approved':
            $status = 'Approved';
            if ($order->getCurrentState() == Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS')) {        //Don't change status if it was changed manually before
                if (abs($json['transaction_amount'] - $totalToPay) > $mercadopago->delta)
                    setOrderState($order, 'PS_OS_ERROR');                     //The payed amount doesn't match
                else
                    setOrderState($order, 'PS_OS_PAYMENT');                   //All is well
            }
            break;
        case 'cancelled':
            $status = 'Cancelled';
            setOrderState($order, 'PS_OS_CANCELED');
            break;
        case 'refunded':
            if ($order->getCurrentState() == Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS'))
                $order->setCurrentState(Configuration::get('PS_OS_ERROR'));
            break;
        default:
            $status = 'Unrecognized status';
            break;
    }
    header('HTTP/1.0 200 OK');
}


function setOrderState($order, $state)      //Add support for Prestashop version  < 1.3.7
{
    if (!method_exists('Order','setCurrentState')) {
        global $cookie;
        $history = new OrderHistory();
        $history->id_order = intval($order->id);
        $history->changeIdOrderState(constant('_'.$state.'_'), intval($order->id));
        if (!$history->addWithemail())
            return false;
    } else {
        if (!Configuration::get($state))
            Configuration::set($state, constant('_'.$state.'_'));
        $order->setCurrentState(Configuration::get($state));
    }
}

?>
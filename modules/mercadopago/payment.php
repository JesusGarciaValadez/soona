<?php
/*
 * Mercadopago Payment Gateway Module for Prestashop
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.2
 */
 
/**
 * This file is only for Prestashop versions 1.3.x and 1.4.x
 */

require(dirname(__FILE__) . '/../../config/config.inc.php');
require(dirname(__FILE__) . '/../../init.php');
require(dirname(__FILE__) . '/mercadopago.php');

if (!$cookie->isLogged(true))
    Tools::redirect('authentication.php?back=order.php');

$mercadopago = new Mercadopago();
$data = $mercadopago->process();
if (in_array(Configuration::get(Mercadopago::CONFIG_PREFIX.'_CHECKOUT_TYPE'), array('modal', 'iframe'))) {
    include_once(dirname(__FILE__) . '/../../header.php');
    echo $mercadopago->displayCheckoutOld($data);
    include_once(dirname(__FILE__) . '/../../footer.php');
} else
    header('Location: '.$data['mpInit']);
exit;
?>
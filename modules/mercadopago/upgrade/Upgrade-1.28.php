<?php
/*
 * File: /upgrade/Upgrade-1.28.php
 * @file-version 0.2
 */

function upgrade_module_1_28($module) {
  // Process Module upgrade to API 2.0
  return (
    Configuration::deleteByName(Mercadopago::CONFIG_PREFIX.'_MERCHANT_ID') AND
    Configuration::deleteByName(Mercadopago::CONFIG_PREFIX.'_SECRET') AND
    Configuration::deleteByName(Mercadopago::CONFIG_PREFIX.'_IPN_KEY') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_CLIENT_ID', '0') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_CLIENT_SECRET', '') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_TOKEN_KEY', '') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_TOKEN_DATE', '') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_PAYMENT_METHODS', '["account_money","credit_card","debit_card","ticket","bank_transfer","atm"]') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_CHECKOUT_TYPE', 'modal') AND
    Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_INSTALLMENTS', '')
  );
}

?>
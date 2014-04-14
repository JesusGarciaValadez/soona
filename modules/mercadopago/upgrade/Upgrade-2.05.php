<?php
/*
 * File: /upgrade/Upgrade-2.05.php
 * @file-version 0.2
 */

function upgrade_module_2_05($module) {
    // Process Module upgrade for commissions functionality
    return (
        Db::getInstance()->execute(
            'ALTER TABLE `' . _DB_PREFIX_ . Mercadopago::DB_TABLE . '` ADD `fee` varchar(10) NULL'
        ) AND
        Configuration::updateValue(Mercadopago::CONFIG_PREFIX.'_FEE', '0.00%')
    );
}

?>
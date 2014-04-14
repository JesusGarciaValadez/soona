<?php
/*
 * Mercadopago Payment Gateway Module for Prestashop
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.1
 */

class MercadopagoPaymentModuleFrontController extends ModuleFrontController
{
	public $display_column_left = FALSE;
    public $display_column_right = FALSE;
	public $ssl = TRUE;
    
    public function initContent()
	{
		parent::initContent();
    
        $mercadopago = new Mercadopago();
        $data = $mercadopago->process();
        if (in_array(Configuration::get(Mercadopago::CONFIG_PREFIX.'_CHECKOUT_TYPE'), array('modal', 'iframe'))) {
            $this->context->smarty->assign($data);
            $this->setTemplate('confirmation.tpl');
        } else
            Tools::redirect($data['mpInit']);        //send to Mercadopago checkout
    }
}
 
?>
<?php
/*
 * Mercadopago Payment Gateway Module for Prestashop
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.5
 */

class MercadopagoValidationModuleFrontController extends ModuleFrontController
{
    public $display_header = false;
	public $display_footer = false;
    public $display_column_left = false;
    public $display_column_right = FALSE;
	public $ssl = true;

    protected $lock_file = 'lock/validator.lock';
    protected $lock_handler;
    protected $lockActive = FALSE;

    public function initContent()
	{
        self::$initialized = true;
        $this->process();

        $mercadopago = New Mercadopago();
        if (Tools::getValue('cid') && Tools::getValue('tid')) {       //Customer came back from Mercadopago's page after paying
            $cart = New Cart((int)Tools::getValue('cid'));
            $transactionId = pSQL(Tools::getValue('tid'));
            if (!$mercadopago->getFieldFromTransactionId($transactionId,'order_id') && $this->lock() && !$cart->OrderExists()) {
                Shop::setContext(Shop::getContext(), $cart->id_shop);
                ob_start();         //Catch 'Cart cannot be loaded or an order has already been placed using this cart' error
                $mercadopago->validateOrder($cart->id, Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS'), $cart->getOrderTotal(TRUE, Cart::BOTH, NULL, $cart->id_carrier), 'Mercadopago', $cart->gift_message, array('transaction_id'=>$transactionId), NULL, false, $cart->secure_key);
                ob_end_clean();
                $mercadopago->assignOrderToTransaction($cart);
                $this->unlock();
            }
            Tools::redirect('index.php?controller=order-confirmation');
        } elseif (Tools::getValue('topic') AND Tools::getValue('id') AND Tools::getValue('topic') == 'payment') {     //IPN notification arrived
            $json = $mercadopago->queryTransactionData(Tools::getValue('id'));
            $transactionId = pSQL($json['external_reference']);
            $orderId = $mercadopago->getFieldFromTransactionId($transactionId, 'order_id');
            if (!$orderId) {            //Mercadopago IPN order notification came before customer returned to page
                $cartId = $mercadopago->getFieldFromTransactionId($transactionId, 'cart_id') OR die('Cart not registered');
                $cart = New Cart((int)$cartId);
                if (!$mercadopago->getFieldFromTransactionId($transactionId,'order_id') && $this->lock() && !$cart->OrderExists()) {
                    Shop::setContext(Shop::getContext(), $cart->id_shop);
                    $mercadopago->validateOrder($cart->id, Configuration::get(Mercadopago::CONFIG_PREFIX.'_WAIT_STATUS'), $cart->getOrderTotal(TRUE, Cart::BOTH, NULL, $cart->id_carrier), 'Mercadopago', $cart->gift_message, array('transaction_id'=>$transactionId), NULL, false, $cart->secure_key);
                    $mercadopago->assignOrderToTransaction($cart);
                    $this->unlock();
                }
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
                            $order->setCurrentState(Configuration::get('PS_OS_ERROR'));                 //The payed amount doesn't match
                        else
                            $order->setCurrentState(Configuration::get('PS_OS_PAYMENT'));               //All is well
                    }
                    break;
                case 'cancelled':
                    $status = 'Cancelled';
                    $order->setCurrentState(Configuration::get('PS_OS_CANCELED'));
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
    }

    /**
     *  Lock validator.lock file while we validate the order
     */
    protected function lock()
    {
        $this->lock_handler = fopen(_PS_MODULE_DIR_.'mercadopago/'.$this->lock_file, 'w+');
        if(!flock($this->lock_handler, LOCK_EX)) {
            return FALSE;
        }
        $this->lockActive = TRUE;
        ftruncate($this->lock_handler, 0);
        fwrite($this->lock_handler, 'Locked at '.date(DATE_RFC2822)." \n");
        fflush($this->lock_handler);
        return TRUE;
    }

    /**
     *  Unlock validator.lock file after validating the order
     */
    protected function unlock()
    {
        if(!flock($this->lock_handler, LOCK_UN)) {
            return FALSE;
        }
        ftruncate($this->lock_handler, 0);
        $this->lockActive = FALSE;
        return TRUE;
    }

    /**
     *  redirect to store on 'Cart cannot be loaded or an order has already been placed using this cart' error
     */
    public function __destruct()
    {
        if ($this->lockActive) {
            $this->unlock();
        }
        $message = ob_get_clean();
        if (strpos($message, 'rder has already been placed') > 0) {
            Tools::redirect('index.php?controller=order-confirmation');
        } else {
            parent::__destruct();
        }
    }
}

?>
<?php
/*
 * Mercadopago IPN Payment Gateway Module for Prestashop
 * Tested in Prestashop v1.3.1.0, 1.3.7.0, 1.4.1.0, 1.4.9.0, 1.5.0.17, 1.5.1.0, 1.5.5.0, 1.5.6.0
 * 
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @version 2.08
 *  
 */
 
if (!defined('_PS_VERSION_'))
    exit;

class Mercadopago extends PaymentModule
{
    const CONFIG_PREFIX = 'MERCADOPAGO';    //prefix for all internal config constants
    const DB_TABLE = 'mercadopago_orders';
    protected $PSVER = array();
    protected $countryCurrency = array( 'mla'=>'ars', 'mlb'=>'brl', /*'mlc'=>'clp',*/ 'mlm'=>'mxn','mlv'=>'vef', /*'mco'=>'cop'*/ );
    protected $countryName = array( 'mla'=>'Argentina', 'mlb'=>'Brasil', /*'mlc'=>'Chile',*/ 'mlm'=>'Mexico', 'mlv'=>'Venezuela', /*'mco'=>'Colombia'*/ );
    protected $paymentsArray = array(
        //'account_money',
        'credit_card',
        'debit_card',
        'ticket',
        'bank_transfer',
        'atm'
    );
    public $delta = 1;          //Maximum amount of permissible discrepancy between Order amount and amount payed by Customer, in Currency Units
    public $transactionId;
    public $wait_status = '';

    public function __construct()
	{
        $this->PSVER = explode('.', _PS_VERSION_);      //Prestashop version checks depend on this
        $this->name = 'mercadopago';     //DON'T CHANGE!!
		$this->tab = ((int)$this->PSVER[0] < 2 && (int)$this->PSVER[1] < 4) ? 'Payment' : 'payments_gateways';        //1.3.x Hack
		$this->version = '2.08';
		$this->author = 'R. Kazeno';
        $this->module_key = 'b4f53a8ae2244d9c8f4579f2447b70e3';
        $this->currencies = TRUE;
        $this->currencies_mode = 'radio';
        
        parent::__construct();
        $this->displayName = 'Mercadopago';
		$this->description = $this->l('Accept Mercadopago payments using the IPN 2.0 API');
        $this->confirmUninstall = $this->l('This will delete any configured settings for this module. Continue?');
        $warnings = array();
        $shopCurrency = $this->getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
        if (!is_object($shopCurrency)) {            //Assume default currency if none registered
            $shopCurrency = NEW Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
        }
        if (!function_exists('fsockopen'))          //Check on initialization if fsockopen connections are not blocked by host
            array_push($warnings, $this->l('Your host has disabled fsockopen. Contact their technical support to have them enable outbound connections for your account.'));
        if (!extension_loaded('openssl'))
            array_push($warnings, $this->l('You have the Openssl PHP extension disabled. This module requires external SSL connections.'));
        if (Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID') != 0 AND !in_array(strtolower($shopCurrency->iso_code), $this->countryCurrency))
            array_push($warnings, $this->l('Selected currency not supported by Mercadopago. Please change it in your Currency Restrictions configuration.'));
        if (Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID')=='0' OR !strlen(Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID')))
            array_push($warnings, $this->l('You need to configure your account settings.'));
        if (Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE'))
            array_push($warnings, $this->l('Sandbox mode is currently enabled. The store will not process real customer payments until it\'s disabled.'));
        if (!extension_loaded('json'))
            array_push($warnings, $this->l('JSON extension not installed. This module requires it for handling JSON-encoded data.'));
        $this->warning = implode(' | ', $warnings);
        if ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 AND strlen(Configuration::get(self::CONFIG_PREFIX.'_MERCHANT_ID'))) {       //Force upgrade to API 2.0 on older PS versions
            require_once _PS_ROOT_DIR_."/modules/{$this->name}/upgrade/Upgrade-1.28.php";
            upgrade_module_1_28($this);
        }
        if ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 AND !strlen(Configuration::get(self::CONFIG_PREFIX.'_FEE'))) {       //Force upgrade to version 2.05 on older PS versions
            require_once _PS_ROOT_DIR_."/modules/{$this->name}/upgrade/Upgrade-2.05.php";
            upgrade_module_2_05($this);
        }
        if (!isset($this->context)) {       //Hack for Prestashop versions < 1.5
            global $smarty, $cart, $cookie;
            $this->context = new stdclass();
            $this->context->language = new Language(isset($cookie) ? $cookie->id_lang : intval(Configuration::get('PS_LANG_DEFAULT')));
            $this->context->cart = isset($cart) ? $cart : New Cart();
            $this->context->currency = new Currency(isset($cart) ? $cart->id_currency : $this->getCurrency()->id);
            $this->context->smarty = isset($smarty) ? $smarty : new stdclass();
            $this->context->cookie = isset($cookie) ? $cookie : new stdclass();
        }
    }
    
    public function install()
    {
        $mails = array(
            'en/waiting_for_payment.txt',
            'en/waiting_for_payment.html',
            'es/waiting_for_payment.txt',
            'es/waiting_for_payment.html'
        );
        foreach ($mails as $file) {             //install pending status mail templates
            if (!file_exists(_PS_MAIL_DIR_.$file) && is_dir(_PS_MAIL_DIR_.substr($file, 0, 2))) {
                copy(_PS_ROOT_DIR_."/modules/{$this->name}/mails/{$file}", _PS_MAIL_DIR_.$file);
            }
        }

        $db = Db::getInstance();
        return (
            parent::install() AND
            $db->Execute(
                'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . self::DB_TABLE . '` (
                `transaction_id` varchar(20) NOT NULL,
                `order_id` int(10) NULL,
                `cart_id` int(10) NOT NULL UNIQUE,
                `fee` varchar(10) NULL,
                PRIMARY KEY (`transaction_id`)
                )') AND
            $this->registerHook('payment') AND
            $this->registerHook('paymentReturn') AND
            $this->registerHook('invoice') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_CLIENT_ID', '0') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_CLIENT_SECRET', '') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_TOKEN_KEY', '') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_TOKEN_DATE', '') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_COUNTRY', 'mla') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_PAYMENT_METHODS', '["account_money","credit_card","debit_card","ticket","bank_transfer","atm"]') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_INSTALLMENTS', '') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_CHECKOUT_TYPE', 'modal') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_SANDBOX_MODE', '0') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_FEE', '0.00%') AND
            Configuration::updateValue(self::CONFIG_PREFIX.'_WAIT_STATUS', '0')
        );
    }
    
    public function uninstall()
    {
        return (parent::uninstall() AND 
            Configuration::deleteByName(self::CONFIG_PREFIX.'_CLIENT_ID') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_CLIENT_SECRET') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_TOKEN_KEY') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_TOKEN_DATE') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_COUNTRY') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_PAYMENT_METHODS') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_INSTALLMENTS') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_CHECKOUT_TYPE') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_SANDBOX_MODE') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_FEE') AND
            Configuration::deleteByName(self::CONFIG_PREFIX.'_WAIT_STATUS')
        );
    }
    
    
    public function getContent()
    {
        require_once 'API/mercadopagoAPI.php';
        ob_start();
        echo "<h2>{$this->displayName}</h2>\n";
        if (Tools::isSubmit('submitMercadopago'))
            echo $this->_getErrors() ? $this->_getErrors() : $this->_saveConfig();
        if (Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID') != '0' AND strlen(Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID'))) {
            //Check IPN Access is working correctly
            try {
                $this->_getUpdatedToken(TRUE) OR $this->displayError($this->l('Invalid response from Mercadopago authentication server'));
            } catch (Exception $e) {
                echo $this->displayError($e->getMessage());
            }
        }
        $currentCountry = Tools::getValue('country', Configuration::get(self::CONFIG_PREFIX.'_COUNTRY'));
        $countrySelect = array($currentCountry => ' selected="selected"')  +
            array_combine( array_flip($this->countryName), array_fill(1, count($this->countryName), '') );     //Adds "selected" attribute to current country
        $currentCurrency = $this->getCurrency();
        $payments = Tools::getValue('payment', $this->_getPaymentConfig());
        $statuses = OrderState::getOrderStates($this->context->language->id);
        $waitStatus = $this->wait_status ? $this->wait_status : Tools::getValue('wait_status', Configuration::get(self::CONFIG_PREFIX.'_WAIT_STATUS'));
        $orderState = new OrderState($waitStatus);
        switch ($this->context->language->iso_code) {
            case 'es':
            case 'ar':
            case 'mx':
            case 'cl':
            case 'co':
            case 've':
                $doclang = 'es_AR';
                break;
            case 'pt':
            case 'br':
                $doclang = 'pt_BR';
                break;
            default:
                $doclang = 'en_US';
                break;
        }
        ?>
            <form id="mp_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <fieldset>
                    <legend>1. <?php echo $this->l('Account'); ?></legend>
                    <label for="mp_country"><?php echo $this->l('Country')?></label>
                    <div class="margin-form">
                        <select name="country" id="mp_country">
                            <option value="mla"<?php echo $countrySelect['mla']; ?>>Argentina</option>
                            <option value="mlb"<?php echo $countrySelect['mlb']; ?>>Brasil</option>
                            <?php /*<option value="mlc"<?php echo $countrySelect['mlc']; ?>>Chile</option>*/?>
                            <?php /*<option value="mco"<?php echo $countrySelect['mco']; ?>>Colombia</option>*/?>
                            <option value="mlm"<?php echo $countrySelect['mlm']; ?>>Mexico</option>
                            <option value="mlv"<?php echo $countrySelect['mlv']; ?>>Venezuela</option>
                        </select>
                    </div>
                    <p><?php echo $this->l('After selecting your country above and logging into your Mercadopago account in a different browser window, you\'ll find the info you need at the following address (opens in a new window):')?>
                        <?php  $dataUrl = 'https://www.mercadopago.com/' . $currentCountry . ($currentCountry == 'mlb' ? '/ferramentas/aplicacoes' : '/herramientas/aplicaciones');  ?>
                        <a id="mp_config_link" href="<?php  echo $dataUrl;  ?>" target="_blank" style="text-decoration: underline; font-weight: 700;"><?php  echo $dataUrl;  ?></a></p><br />
                    <label for="mp_client_id"><?php echo $this->l('Client Id')?></label>
                    <div class="margin-form">
                        <input type="text" name="client_id" id="mp_client_id" value="<?php echo Tools::getValue('client_id', Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID')); ?>" style="width: 220px;" />
                    </div>
                    <label for="mp_client_secret"><?php echo $this->l('Client Secret')?></label>
                    <div class="margin-form">
                        <input type="text" name="client_secret" id="mp_client_secret" value="<?php echo Tools::getValue('client_secret', Configuration::get(self::CONFIG_PREFIX.'_CLIENT_SECRET')); ?>" style="width: 220px;" />
                    </div>
                    <p><?php echo $this->l('Remember you must select your merchant currency in the "Currencies Restrictions" section of the "Payment" tab.'); ?></p>
                    <p><?php echo $this->l('Currently selected currency for this module: '); ?><b><?php echo $currentCurrency->name . " ({$currentCurrency->iso_code})"; ?></b></p>
                </fieldset><br />
                <fieldset id="mp_payments">
                    <legend>2. <?php echo $this->l('Payment methods you wish to accept'); ?></legend>
                    <label><?php echo $this->l('Credit Card'); ?> <input type="checkbox" name="payment[ ]" value="credit_card"<?php echo (in_array('credit_card',$payments)?' checked="checked"':''); ?> /></label>
                    <label><?php echo $this->l('Debit Card'); ?> <input type="checkbox" name="payment[ ]" value="debit_card"<?php echo (in_array('debit_card',$payments)?' checked="checked"':''); ?> /></label>
                    <label><?php echo $this->l('Ticket'); ?> <input type="checkbox" name="payment[ ]" value="ticket"<?php echo (in_array('ticket',$payments)?' checked="checked"':''); ?> /></label>
                    <label><?php echo $this->l('Bank Transfer'); ?> <input type="checkbox" name="payment[ ]" value="bank_transfer"<?php echo (in_array('bank_transfer',$payments)?' checked="checked"':''); ?> /></label>
                    <label><?php echo $this->l('ATM Bank Transfer'); ?> <input type="checkbox" name="payment[ ]" value="atm"<?php echo (in_array('atm',$payments)?' checked="checked"':''); ?> /></label><br/><br/><br/><br/>
                    <label for="mp_fee"><?php echo $this->l('Additional fee'); ?></label>
                    <div class="margin-form"><input type="text" name="fee" id="mp_fee" maxlength="10" value="<?php echo Tools::getValue('fee', Configuration::get(self::CONFIG_PREFIX.'_FEE')); ?>" /><br/><?php echo $this->l('Additional fee you want to charge customers who choose this payment option. Can be either a fixed amount (without the percent sign) or a percentage (ending with the percent sign). Set to either 0.00 or 0.00% to disable.'); ?></div>
                </fieldset><br />
                <fieldset>
                    <legend>3. <?php echo $this->l('Client Checkout Type'); ?></legend>
                    <label><abbr title="<?php echo $this->l('Translucent overlay on top of your store\'s page'); ?>"><?php echo $this->l('Modal Window'); ?></abbr> <input type="radio" name="checkout_type" value="modal"<?php echo (Tools::getValue('checkout_type', Configuration::get(self::CONFIG_PREFIX.'_CHECKOUT_TYPE'))=='modal'?' checked="checked"':''); ?> /></label>
                    <?php /* <label><abbr title="<?php echo $this->l('Checkout looks like it\'s inside your store'); ?>"><?php echo $this->l('Integrated iframe'); ?></abbr> <input type="radio" name="checkout_type" value="iframe"<?php echo (Tools::getValue('checkout_type', Configuration::get(self::CONFIG_PREFIX.'_CHECKOUT_TYPE'))=='iframe'?' checked="checked"':''); ?> /></label>*/?>
                    <label><abbr title="<?php echo $this->l('User is temporarily redirected to Mercadopago\'s server'); ?>"><?php echo $this->l('Redirection'); ?></abbr> <input type="radio" name="checkout_type" value="redirect"<?php echo (Tools::getValue('checkout_type', Configuration::get(self::CONFIG_PREFIX.'_CHECKOUT_TYPE'))=='redirect'?' checked="checked"':''); ?> /></label><br /><br />
                    <label for="mp_sandbox"><?php echo $this->l('Enable sandbox mode'); ?></label>
                    <div class="margin-form"><input type="checkbox" name="sandbox" id="mp_sandbox" value="1"<?php echo (Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE')?' checked="checked"':''); ?> /> <strong>(<?php echo $this->l('Only for testing, normal payments won\'t work until disabled'); ?>)</strong></div>
                    <p>
                        <?php echo $this->l('Sandbox mode allows you to test Mercadopago\'s checkout using simulated payments, without using your own credit cards or Mercadopago account balance. You can check how to use it when making test orders to generate specific payment statuses at the following URL (opens in a new window):')?>
                        <a id="mp_config_link" href="https://developers.mercadopago.com/sandbox?lang=<?php  echo $doclang;  ?>#sandbox-ip-examples" target="_blank" style="text-decoration: underline; font-weight: 700;">https://developers.mercadopago.com/sandbox?lang=<?php  echo $doclang;  ?>#sandbox-ip-examples</a>
                    </p>
                </fieldset><br />
                <fieldset>
                    <legend>4. <?php echo $this->l('Integration'); ?></legend>
                    <p class="description" style="padding-top: 10px; padding-bottom: 10px;"><?php echo $this->l('You need to configure the IPN address in your Mercadopago account. Copy the following address into your clipboard:'); ?><br /><br />
                    <b style="display: block; text-align: center;"><?php echo (method_exists('Tools','getShopDomainSsl') ? Tools::getShopDomainSsl(true, true) : Tools::getHttpHost(true, true)) .      //1.3.x Hack
                            __PS_BASE_URI__ . ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? "modules/{$this->name}/validation.php" : "index.php?fc=module&module={$this->name}&controller=validation"); ?></b><br />
                    <?php echo $this->l('Now open the following link, which will take you to your Mercadopago IPN settings page, and paste the above address you just copied into the "Notification URL" field and click "Save":'); ?><br />
                    <?php  $dataUrl2 = 'https://www.mercadopago.com/' . $currentCountry . ($currentCountry == 'mlb' ? '/ferramentas/notificacoes' : '/herramientas/notificaciones');  ?>
                    <a id="mp_config_link2" href="<?php  echo $dataUrl2;  ?>" target="_blank" style="text-decoration: underline; font-weight: 700;"><?php  echo $dataUrl2;  ?></a>
                    <?php echo $this->l('(opens in a new window)'); ?></p><br />
                    <label for="mp_wait_status"><?php echo $this->l('Pending Order Status'); ?></label>
                    <div class="margin-form">
                        <select name="wait_status" id="mp_wait_status">
                            <option value="0"><?php echo $this->l('Select a status for pending orders'); ?>...</option>
                            <option value="new">==<?php  echo $this->l('Create a new status');  ?>==</option>
                    <?php foreach ($statuses as $stat) : 
                        if ($stat['id_order_state'] < 10)
                            continue;
                        $selectedStat = $stat['id_order_state']==$orderState->id ? 'selected="selected"' : '';
                    ?>
                            <option value="<?php  echo $stat['id_order_state'];  ?>" <?php  echo $selectedStat;  ?> ><?php  echo $stat['name'];  ?></option>
                    <?php endforeach; ?>
                        </select>
                    </div>
                    <p style="clear:both;"><?php  echo $this->l('This is the status that will be assigned to incoming orders marked as "pending". You can create a new status by selecting "Create a new status" and naming it something like "Awaiting Mercadopago Payment"');  ?></p>
                </fieldset><br />
                <div class="clear center"><input type="submit" name="submitMercadopago" class="button" value="   <?php echo $this->l('Save'); ?>   " /></div>
            </form>
            <script>
                (function() {
                    var link = $("#mp_config_link");
                    var link2 = $("#mp_config_link2");
                    var sel = $("#mp_country");
                    var sel2 = $("#mp_wait_status");
                    var newStatCode = '<div id="new-status">'+
                        '<label style="width:400px; position: relative; left: -100px;"><?php  echo $this->l('Status Name');  ?> <input type="text" name="wait_status_name" id="mp_new_status_name" style="width:260px;" /></label>'+
                        '<label style="width:260px; position: relative; left: -100px;"><?php  echo $this->l('Status Color');  ?> <input type="color" data-hex="true" class="color mColorPickerInput" name="color" id="mp_color" value="'+
                        '<?php echo htmlentities($orderState->color, ENT_COMPAT, 'UTF-8'); ?>" /></label>'+
                        '<script src="../js/jquery/jquery-colorpicker.js"></scr'+'ipt>'+
                        '</div>';
                    function changeUrls() { 
                        var country = sel.val();
                        var url = country == 'mlb' ? '/ferramentas/aplicacoes' : '/herramientas/aplicaciones';
                        link.html('https://www.mercadopago.com/'+country+url).attr('href', 'https://www.mercadopago.com/'+country+url);
                        var url2 = country == 'mlb' ? '/ferramentas/notificacoes' : '/herramientas/notificaciones';
                        link2.html('https://www.mercadopago.com/'+country+url2).attr('href', 'https://www.mercadopago.com/'+country+url2);
                    }
                    function toggleNewStat() { 
                        if (sel2.val()=='new') {
                            sel2.after(newStatCode);
                        } else {
                            $('#new-status').remove();
                        }
                    }
                    sel.bind("change", changeUrls);
                    sel2.bind("change", toggleNewStat);
                })();
            </script>
        <?php
        return ob_get_clean();
    }
    
    protected function _getErrors()
    {
        $error = '';
        if (!is_numeric(trim(Tools::getValue('client_id'))) || Tools::getValue('client_id')==0)
            $error .= $this->displayError($this->l('Invalid Client Id'));
        if (!Tools::getValue('client_secret'))
            $error .= $this->displayError($this->l('Invalid Secret'));
        if (!Tools::getValue('payment'))
            $error .= $this->displayError($this->l('You must select at least one payment type'));
        if ((!is_numeric(Tools::getValue('wait_status')) && !Tools::getValue('wait_status_name')) || (is_numeric(Tools::getValue('wait_status')) && Tools::getValue('wait_status')<1))
            $error .= $this->displayError($this->l('Invalid Pending Order Status'));
        if (!preg_match('/^[\d]*[\.]?[\d]*%?$/', Tools::getValue('fee')) OR Tools::getValue('fee') == '%')
            $error .= $this->displayError($this->l('Additional fee format is incorrect. Should be either an amount, such as 7.50, or a percentage, such as 6.99%'));
        return $error;
    }
    
    protected function _saveConfig()
    {
        $extraMessage = '';
        $countryCurrencyId = Currency::getIdByIsoCode($this->countryCurrency[Tools::getValue('country')]);
        if (!empty($countryCurrencyId) && $this->getCurrency()->id != $countryCurrencyId) {           //If currency differs from module's country setting, attempt to adjust it automatically
            $countryCurrency = New Currency($countryCurrencyId);
            Db::getInstance()->Execute('
                DELETE FROM '._DB_PREFIX_.'module_currency
                WHERE `id_module` = ' . $this->id
            );
            $extraMessage = Db::getInstance()->Execute('
                INSERT INTO '._DB_PREFIX_."module_currency
                (`id_currency`, `id_module`)
                VALUES ({$countryCurrencyId}, {$this->id})"
                )  ?  '<br />'.$this->l('This module\'s currency has been changed automatically to ').$countryCurrency->name  :  '';
        }
        $waitStatus = Tools::getValue('wait_status');
        if ($name = Tools::getValue('wait_status_name')) {          //Create a new Order State for pending orders
            $orderState = new OrderState();
            $orderState->name = array($this->context->language->id => $name);
            $orderState->template = array(1 => 'waiting_for_payment');
            $orderState->send_email = FALSE;
            $orderState->invoice = FALSE;
            $orderState->color = Tools::getValue('color');
            $orderState->unremovable = FALSE;
            $orderState->logable = FALSE;
            $orderState->delivery = FALSE;
            $orderState->hidden = FALSE;
            if ($orderState->add()) {
                $waitStatus = $orderState->id;
                $extraMessage .= '<br />'.$this->l('New pending order status created')." ID: $waitStatus";
                $this->wait_status = $waitStatus;
            }
        }
        Configuration::updateValue(self::CONFIG_PREFIX.'_COUNTRY', Tools::getValue('country'));
        Configuration::updateValue(self::CONFIG_PREFIX.'_CLIENT_ID', trim(Tools::getValue('client_id')));
        Configuration::updateValue(self::CONFIG_PREFIX.'_CLIENT_SECRET', trim(Tools::getValue('client_secret')));
        Configuration::updateValue(self::CONFIG_PREFIX.'_WAIT_STATUS', $waitStatus);
        Configuration::updateValue(self::CONFIG_PREFIX.'_PAYMENT_METHODS', json_encode(Tools::getValue('payment')));
        Configuration::updateValue(self::CONFIG_PREFIX.'_CHECKOUT_TYPE', Tools::getValue('checkout_type'));
        Configuration::updateValue(self::CONFIG_PREFIX.'_SANDBOX_MODE', Tools::getValue('sandbox') ? 1 : 0);
        Configuration::updateValue(self::CONFIG_PREFIX.'_FEE', Tools::getValue('fee'));
        return $this->displayConfirmation($this->l('Configuration saved') . $extraMessage);
    }
    
    
    public function hookPayment($params)
    {
        //Return False unless there are no warnings or the only warning is about sandbox mode
        if (!$this->active OR strpos($this->warning, '|') OR (strlen($this->warning) AND stripos($this->warning, 'sandbox')===FALSE))
            return FALSE;
        if (Configuration::get(self::CONFIG_PREFIX.'_CHECKOUT_TYPE') == 'redirect') {
            $btext2 = '(' . $this->l('your order will be redirected to Mercadopago\'s payment system') . ')';
        }
        $requireFee = (bool)($this->getTotalWithFee(1, Configuration::get(self::CONFIG_PREFIX.'_FEE'))>1);
        $feeamount = strpos(Configuration::get(self::CONFIG_PREFIX.'_FEE'), '%') ? Configuration::get(self::CONFIG_PREFIX.'_FEE') : $this->context->currency->sign . Configuration::get(self::CONFIG_PREFIX.'_FEE');
        $feetext = $this->l('An extra fee of') . " $feeamount " . $this->l('will apply to payments using this method');
        $this->context->smarty->assign(  array(
            'buttonText' => ($this->l('Pay with Mercadopago ') ." ". $this->countryName[Configuration::get(self::CONFIG_PREFIX.'_COUNTRY')]),
            'buttonText2' => isset($btext2) ? $btext2 : '',
            'mpCountry' => Configuration::get(self::CONFIG_PREFIX.'_COUNTRY'),
            'paymentPath' => (method_exists('Tools','getShopDomainSsl') ? Tools::getShopDomainSsl(true, true) : Tools::getHttpHost(true, true))
                .((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? $this->_path.'payment.php' : __PS_BASE_URI__."index.php?fc=module&module={$this->name}&controller=payment"),
            'imagePath' => (method_exists('Tools','getShopDomainSsl') ? Tools::getShopDomainSsl(true, true) : Tools::getHttpHost(true, true)).$this->_path,
            'sandboxMode' => Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE') ? $this->l('Sandbox mode on, only for testing') : FALSE,
            'mpFee' => $requireFee ? $feetext : '',
            'this_name' => $this->name
        ) );
        return $this->display(__FILE__, 'views/templates/hooks/payment.tpl');
    }
    
    public function hookPaymentReturn($params)
    {
        if (!$this->active)
			return FALSE;
		return $this->display(__FILE__, 'views/templates/hooks/payment_return.tpl');
    }
    
    public function hookInvoice($params)
    {
        $order = New Order($params['id_order']);
        if ($order->module!=$this->name)
            return FALSE;
        
        require_once 'API/mercadopagoAPI.php';
        $transactionId = Db::getInstance()->getValue('SELECT `transaction_id` FROM `' . _DB_PREFIX_ . self::DB_TABLE . '` WHERE `order_id` = ' . $order->id);
        $collection = queryJsonTransaction($transactionId, $this->_getUpdatedToken(), TRUE, Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE'));
        switch ($collection['status']) {
            case 'pending':
                $status = $this->l('Pending');
                break;
            case 'approved':
                $status = $this->l('Approved');
                break;
            case 'in_process':
                $status = $this->l('In process');
                break;
            case 'rejected':
                $status = $this->l('Rejected');
                break;
            case 'cancelled':
                $status = $this->l('Cancelled');
                break;
            case 'refunded':
                $status = $this->l('Refunded');
                break;
            case 'in_mediation':
                $status = $this->l('In mediation');
                break;
            default:
                $status = $this->l('Error querying Mercadopago server');
                break;
        }
        $currency = new Currency($order->id_currency);
        $fee = $this->getFieldFromTransactionId($transactionId, 'fee');
        $totalToPay = Tools::ps_round($this->getTotalWithFee($order->total_paid, $fee), 2);
        $paidFee = $totalToPay - $order->total_paid;
        $mpId = $collection['id'];
        ob_start();
        ?>
            <fieldset style="width: 400px; position: relative; left: 10px; margin-top: 26px;">
                <legend><img src="../modules/mercadopago/logo.gif" alt="logo" /><?php echo $this->l('Mercadopago Transaction Information'); ?></legend>
                <?php echo $this->l('Mercadopago ID') . ": $mpId"; ?><br />
                <?php echo $this->l('Transaction ID') . ": $transactionId"; ?><br />
                <?php echo $this->l('Status') . ": $status"; ?><br />
              <?php if ($paidFee != 0):
                echo $this->l('Additional fee') . ": {$currency->sign}{$paidFee}";
              endif; ?><br />
              <?php if ($collection['total_paid_amount']  &&  abs($collection['total_paid_amount'] - $totalToPay) > $this->delta) : ?>
                <div class="warn">
                    <?php  echo $this->l('Warning: Order amount discrepancy, please check your Mercadopago account for order') .' '. $mpId;  ?><br />
                    <?php  echo $this->l('Total amount payed by customer:') .' '. $collection['total_paid_amount'];  ?>
                </div>
              <?php endif; ?>
            </fieldset>
        <?php
        return ob_get_clean();
    }
    
    
    public function process()
    {
        $currency = $this->getCurrency();
        if ((int)$this->context->currency->id != (int)$currency->id) {
            $this->context->cookie->id_currency = $this->context->cart->id_currency = $this->context->currency->id = $currency->id;
            $this->context->cart->update();
        Tools::redirect((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? "modules/{$this->name}/payment.php" : "index.php?fc=module&module={$this->name}&controller=payment");
        }
        $this->transactionId = substr( abs(ip2long($_SERVER['REMOTE_ADDR'])), 0, 10 ) . time();    //create a unique ID based on the current time and customer's IP address
        $this->storeTransaction($this->transactionId);
        require_once 'API/mercadopagoAPI.php';
        if (!$this->context->cart->id)
            Tools::redirect((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? 'order.php' : 'index.php?controller=order');
        $baseUrl = (method_exists('Tools','getShopDomainSsl') ? Tools::getShopDomainSsl(true, true) : Tools::getHttpHost(true, true)) . __PS_BASE_URI__;    //1.3.x Hacks
        $shopCurrency = $this->getCurrency($this->context->cart->id_currency);
        $currentCustomer = New Customer((int)$this->context->cart->id_customer);
        $itemName = $this->l('Order from').' '.Configuration::get('PS_SHOP_NAME');
        if (strlen($itemName)>100)
            $itemName = substr($itemName, 0, 100);
        $price = $this->context->cart->getOrderTotal(TRUE,  (defined('Cart::BOTH') ? Cart::BOTH : 3));
        if (!$shopCurrency->decimals)
            $price = Tools::ps_round((float)$price);
        $products = $this->context->cart->getProducts();
        $productsNum = count($products);
        $requireFee = (bool)($this->getTotalWithFee(1, Configuration::get(self::CONFIG_PREFIX.'_FEE'))>1);
        $items = array();
        for ($i=1; $i<=$productsNum; $i++) {    //Add all items to mercadopago cart
            array_push($items,
                ( !empty($products[$i-1]['legend']) ? $products[$i-1]['legend'] : $products[$i-1]['name']  .  (!empty($products[$i-1]['attributes_small']) ? (' ' . $products[$i-1]['attributes_small']) : '') . '( x' . $products[$i-1]['cart_quantity'] . ')' )
            );
        }
        $price = $requireFee ? Tools::ps_round($this->getTotalWithFee($price, Configuration::get(self::CONFIG_PREFIX.'_FEE')), 2) : $price;
        $mpUrl = getPaymentLink(
            $this->_getUpdatedToken(),
            array(
                'items' => array(array(
                    'title' => $itemName,
                    'quantity' => 1,
                    'unit_price' => (float)$price,
                    'currency_id' => strtoupper($this->context->currency->iso_code),
                    //'picture_url' => '',    ### @todo: insert picture
                    'id' => $this->context->cart->id,
                    'description' => implode('; ',$items)
                )),
                'payer' => array(
                    'name' => $currentCustomer->firstname,
                    'surname' => $currentCustomer->lastname,
                    'email' => $currentCustomer->email
                ),
                'back_urls' => array(
                    'success' => $baseUrl.((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? "modules/{$this->name}/validation.php?cid={$this->context->cart->id}&tid={$this->transactionId}" : "index.php?fc=module&module={$this->name}&controller=validation&cid={$this->context->cart->id}&tid={$this->transactionId}"),
                    'failure' => $baseUrl.((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? ((int)$this->PSVER[1] < 4 ? 'order.php' : 'order-opc.php') : 'index.php?controller=order-opc'),
                    'pending' => $baseUrl.((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? "modules/{$this->name}/validation.php?cid={$this->context->cart->id}&tid={$this->transactionId}" : "index.php?fc=module&module={$this->name}&controller=validation&cid={$this->context->cart->id}&tid={$this->transactionId}")
                ),
                'payment_methods' => array(
                    'excluded_payment_types' => $this->_getExcludedPayments()
                ),
                'external_reference' => $this->transactionId,
            ),
            Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE')
        ) OR die('Payment link request error');
        return array(
            'mpType' => Configuration::get(self::CONFIG_PREFIX.'_CHECKOUT_TYPE'),
            'loadingText' => $this->l('Please wait, Mercadopago\'s payment overlay is being loaded').'...',
            'loaderText' => $this->l('Loading').'...',
            'mpOverlay' => $this->l('Mercadopago checkout overlay in use'),
            'mpRedirecting' => $this->l('Please wait, redirecting').'...',
            'mpInit' => $mpUrl,
            'mpBase' =>  $baseUrl,
            'mpForward' => $baseUrl . ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? "modules/{$this->name}/validation.php?cid={$this->context->cart->id}&tid={$this->transactionId}" : "index.php?fc=module&module={$this->name}&controller=validation&cid={$this->context->cart->id}&tid={$this->transactionId}"),
            'mpBack' => $baseUrl . ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5 ? ((int)$this->PSVER[1] < 4 ? 'order.php' : 'order-opc.php') : 'index.php?controller=order-opc')
        );

    }

    /**
     * Displays checkout template for Prestashop < 1.5
     * @param $smartyData
     * @return string
     */
    public function displayCheckoutOld($smartyData) {
        if ((float)($this->PSVER[0].'.'.$this->PSVER[1]) < 1.5) {
            $this->context->smarty->assign($smartyData);
            return $this->display(__FILE__, 'views/templates/front/confirmation.tpl');
        }
    }

    /**
     * @param $transactionId
     * @return bool
     */
    public function storeTransaction($transactionId)    //store transaction details in DB
    {
        return Db::getInstance()->Execute('
			REPLACE INTO `' . _DB_PREFIX_ . self::DB_TABLE . '` (`transaction_id`, `cart_id`) 
			VALUES (' . pSQL($transactionId) . ', ' . $this->context->cart->id . ')'
            );
    }

    /**
     * @param $cart
     * @return bool
     */
    public function assignOrderToTransaction($cart)          //store new order id in DB
    {
        if ($orderId = Order::getOrderByCartId((int)$cart->id)) {
            return Db::getInstance()->Execute('
                UPDATE `' . _DB_PREFIX_ . self::DB_TABLE . '` 
                SET `order_id` = ' . $orderId . ',
                `fee` = "' . Configuration::get(self::CONFIG_PREFIX.'_FEE') . '"
                WHERE `cart_id` = ' . (int)$cart->id
                );
        }
        return FALSE;
    }

    /**
     * @param string $transactionId
     * @param string $field     Options: order_id, cart_id
     * @return string
     */
    public function getFieldFromTransactionId($transactionId, $field)
    {
        return Db::getInstance()->getValue('SELECT `'.pSQL($field).'` FROM `' . _DB_PREFIX_ . self::DB_TABLE . '` WHERE `transaction_id` = "' . pSQL($transactionId) . '"');
    }


    /**
     * @param $orderId
     * @return array
     */
    public function queryTransactionData($orderId) {
        require_once 'API/mercadopagoAPI.php';
        $json = queryJsonTransaction($orderId, $this->_getUpdatedToken(), FALSE, Configuration::get(self::CONFIG_PREFIX.'_SANDBOX_MODE')) OR die('Error retrieving transaction data');
        return $json;
    }

    /**
     * Apply a fee to a payment amount
     * @param float $netAmount
     * @param string $fee (float with optional percent sign at the end)
     */
    public function getTotalWithFee($netAmount, $fee)
    {
        $fee = strlen($fee) ? $fee : '0';
        return strpos($fee, '%') ? $netAmount*(1+(float)substr($fee, 0, -1)/100) : $netAmount+(float)$fee;
    }


    /**
     * Returns up to date access token
     * @param bool $force
     * @throws Exception
     * @return string
     */
    protected function _getUpdatedToken($force=FALSE)
    {
        $time = getdate();
        $time = $time[0];
        if (!strlen(Configuration::get(self::CONFIG_PREFIX.'_TOKEN_KEY'))
        OR $time >= Configuration::get(self::CONFIG_PREFIX.'_TOKEN_DATE')
        OR $force) {
            $data = retrieveAccessToken(array(
                'id' => Configuration::get(self::CONFIG_PREFIX.'_CLIENT_ID'),
                'secret' => Configuration::get(self::CONFIG_PREFIX.'_CLIENT_SECRET')
            ));
            if (!$data) {
                throw new Exception($this->l('Unable to connect to Mercadopago authentication server, please check your server can initiate outbound connections.'));
            } elseif (isset($data['error']) || !isset($data['access_token'])) {
                throw new Exception($this->l('There seems to be an error in your Client Id or your Client Secret'));
            }
            Configuration::updateValue(self::CONFIG_PREFIX.'_TOKEN_KEY', $data['access_token']);
            Configuration::updateValue(self::CONFIG_PREFIX.'_TOKEN_DATE', $time+$data['expires_in']);
            return $data['access_token'];
        } else
            return Configuration::get(self::CONFIG_PREFIX.'_TOKEN_KEY');
    }

    /*
     *  $config = '["account_money","credit_card","debit_card","ticket","bank_transfer","atm"]'
     */
    protected function _getPaymentConfig()
    {
        return json_decode(Configuration::get(self::CONFIG_PREFIX.'_PAYMENT_METHODS'));
    }

    protected function _getExcludedPayments()
    {
        $payments = array_diff($this->paymentsArray, $this->_getPaymentConfig());
        $formattedPayments = array();
        foreach ($payments as $paym) {
            $formattedPayments[] = array('id' => $paym);
        }
        return $formattedPayments;
    }
}

?>
<?php
/*
 * Mercadopago API interconnection and processing library for the IPN interface
 *  @author Rinku Kazeno <development@kazeno.co>
 *  @file-version 1.5
 * 
 * 
 * Notification Sample:
 *  http://www.yoursite.com/notifications?topic=payment&id=identificador-de-notificación-de-pago
 * 
 * JSON (API 2.0) Transaction Query Response Sample:
    {
        paging: {
            total: 76,
            limit: 2,
            offset: 10
        }
        results: [
            {
                collection:  {
                    id: id-del-pago,
                    site_id: "Identificador de país",
                    date_created: "2011-09-20T00:00:00.000-04:00",
                    date_approved: null,
                    last_modified: "2011-10-19T16:44:34.000-04:00",
                    money_release_date: "2011-10-04T17:32:49.000-04:00",
                    operation_type: "regular_payment",
                    collector_id: id-del-vendedor,
                    payer: {
                        id: id-del-comprador,
                        nickname: "comprador",
                        first_name: "Comprador",
                        last_name: "Comprador",
                        phone: {
                            area_code: "2222",
                            number: "46537890",
                            extension: null
                        },
                        email: "email-del-comprador"
                    },
                    external_reference: "id-referencia-del-vendedor",
                    reason: "Descripción de lo que se está pagando",
                    transaction_amount: 2,
                    total_paid_amount: 2,
                    currency_id: "Tipo de moneda",
                    shipping_cost: 0,
                    status: "cancelled",
                    status_detail: "expired",
                    released: "yes",
                    payment_type: "ticket",
                }
            },
            {
                collection:  {
                    ...
                }
            }
        ]
    }
 * 
 * 
 * XML Transaction Query Response Sample:
    <?xml version="1.0"  encoding="ISO-8859-1"?>
    <result>
        <message>OK</message>
        <operation>
            <!-- Datos  de la operación. -->
            <mp_op_id>el-número-de-operación-de-MercadoPago</mp_op_id>
            <seller_op_id>identificador-de-pago-del-vendedor</seller_op_id>

            <!-- Datos de tu cuenta en MercadoPago. -->
            <acc_id>tu número de cuenta en MercadoPago</acc_id>

            <!-- Información  del pago. -->
            <status>P</status> <!-- Estado del pago. -->
            <status_description>in_process</status_description> <!-- Descripción del estado del pago. -->

            <!-- Producto  pagado. -->
            <item_id>identificador-producto</item_id>
            <name>Nombre del producto</name>

             <!-- Costos. -->
            <price>10.0</price>
            <shipping_amount>5.0</shipping_amount>
            <additional_amount>0</additional_amount>
            <total_amount>15.0</total_amount>

             <!-- Información  que se anexa en la URL de redirección. -->
            <extra_part></extra_part>

             <!-- Medio de pago. -->
            <!-- Descripción en el glosario de parámetros. -->
            <payment_method>TCO</payment_method>

        </operation>
    </result>
 * 
 */

define('MERCADOPAGO_BASE_URL', 'https://api.mercadolibre.com/');
define('MERCADOPAGO_OLD_BASE_URL', 'https://www.mercadopago.com/');

/**
 * @param array $clientData ( 'id', 'secret' )
 * @return string (Access Token)
 */
function retrieveAccessToken(array $clientData)
{
    $fullUrl = MERCADOPAGO_BASE_URL . 'oauth/token';
    $url = parse_url($fullUrl);
    $data = http_build_query(array( 'grant_type' => 'client_credentials', 'client_id' => $clientData['id'], 'client_secret' => $clientData['secret'] ));
    if ($fp = fsockopen('sslv3://'.$url['host'], 443)) {
        fwrite($fp, "POST {$url['path']} HTTP/1.0\r\n");
        fwrite($fp, "Host: {$url['host']}\r\n");
        fwrite($fp, "Accept: application/json\r\n");
        fwrite($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fwrite($fp, "Content-length: " . strlen($data) . "\r\n");
        fwrite($fp, "Connection: close\r\n\r\n");
        fwrite($fp, $data);
        $result = ''; 
        while(!feof($fp)) {
            $result .= fgets($fp);
        }
        fclose($fp);
        $response = explode("\r\n\r\n", trim($result));
        $json = substr($response[1], strpos($response[1], '{'), strrpos($response[1], '}')-strpos($response[1], '{')+1);
        $parsedJson = json_decode($json, TRUE);
        return $parsedJson;
    } else return FALSE;
}


/**
 * @param string $transaction
 * @param string $token
 * @param bool $queryTransactionId [query by external reference instead of id]
 * @return array ( Transaction Data )
 */
function queryJsonTransaction($transaction, $token, $queryTransactionId=FALSE, $sandbox=FALSE)
{
    if (!$token)
        return FALSE;
    $searchParam = $queryTransactionId ? 'external_reference' : 'id';
    $prefix = $sandbox ? 'sandbox/' : '';
    $relUrl = "{$prefix}collections/search?access_token={$token}&{$searchParam}={$transaction}&limit=1";
    $url = parse_url(MERCADOPAGO_BASE_URL . $relUrl);
    if ($fp = fsockopen('sslv3://'.$url['host'], 443)) {
        fwrite($fp, "GET {$url['path']}?{$url['query']} HTTP/1.0\r\n");
        fwrite($fp, "Host: {$url['host']}\r\n");
        fwrite($fp, "Accept: application/json\r\n");
        fwrite($fp, "Connection: close\r\n\r\n");
        $result = ''; 
        while(!feof($fp)) {
            $result .= fgets($fp);
        }
        fclose($fp);
        $response = explode("\r\n\r\n", trim($result));
        $json = substr($response[1], strpos($response[1], '{'), strrpos($response[1], '}')-strpos($response[1], '{')+1);
        try {
            @$parsedJson = json_decode($json, TRUE);
        } catch (Exception $e) {
            return NULL;
        }
        return count($parsedJson['results']) ? $parsedJson['results'][0]['collection'] : NULL;
    } else return NULL;
}


/**
 *  DEPRECATED
 *
 * @param string $transaction
 * @param array $merchantData ( 'id', 'ipn_key', 'country' )
 * @param bool $useMpOpId [query by Mercadopago ID]
 * @return SimpleXMLElement (Transaction Data)
 */
function queryXmlTransaction($transaction, array $merchantData, $useMpOpId=FALSE)
{
    $fullUrl = MERCADOPAGO_OLD_BASE_URL . $merchantData['country'] .'/sonda';
    $url = parse_url($fullUrl);
    $reference = !$useMpOpId ? 'seller_op_id' : 'mp_op_id';
    $data = http_build_query(array( 'acc_id' => $merchantData['id'], 'sonda_key' => $merchantData['ipn_key'], $reference => $transaction ));
    if ($fp = fsockopen('ssl://'.$url['host'], 443)) {
        fwrite($fp, "POST {$url['path']} HTTP/1.0\r\n");
        fwrite($fp, "Host: {$url['host']}\r\n");
        fwrite($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fwrite($fp, "Content-length: " . strlen($data) . "\r\n");
        fwrite($fp, "Connection: close\r\n\r\n");
        fwrite($fp, $data);
        $result = ''; 
        while(!feof($fp)) {
            $result .= fgets($fp);
        }
        fclose($fp);
        $response = explode("\r\n\r\n", trim($result));
        $xml = substr( $response[1], strpos($response[1], '<'), strrpos($response[1], '>')-strpos($response[1], '<')+1 );
        try { @$simplexml = new SimpleXMLElement($xml); }        //Some errors are returned as text, not XML,  by Mercadopago
        catch (Exception $e) {
            $simplexml = new stdClass;
            $simplexml->message = $response[1];
        }
    return $simplexml;
    } else return FALSE;
}


/**
 *  DEPRECATED
 *
 * @param $merchantData      array ( 'acc_id', 'enc' )
 * @param $transactionData   array ( 'seller_op_id', 'country' )
 * @param $productData       array ( 'item_id', 'name', 'price', 'shipping_cost' ) XcurrencyX
 * @param $buyerData         array ( 'name', 'surname', 'email', 'cep', 'street', 'number', 'complement', 'phone', 'district', 'city', 'state', 'doc_nbr' )
 * @param $callbacks         array ( 'url_succesfull', 'url_cancel', 'url_process', 'extra_part' )
 * @return string HTML (<form>)
 */
function createForm($merchantData, $transactionData, $productData, $buyerData, $callbacks)
{
    $action = MERCADOPAGO_OLD_BASE_URL . $transactionData['country'] . '/buybutton';
    $currencies = array(
        'mla'=>'ARG',
        'mlb'=>'REA',
        'mlc'=>'CHI',    ## Confirm
        'mlm'=>'MEX',
        'mlv'=>'VEN',
        'mco'=>'COL',    ## Confirm
        );
    $productData['currency'] = $currencies[$transactionData['country']];
    $attributes = array_merge($merchantData, $productData, $callbacks, array('seller_op_id'=>$transactionData['seller_op_id']));
    ob_start();
    ?>
        <form id="mercadopago_form" action="<?php  echo $action;  ?>" method="post">
    <?php
    foreach($attributes as $name => $value) {
        ?>
            <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
        <?php
    }
    //Send all parameters for Brazil, only names and email otherwise
    $buyerArray = $transactionData['country']=='mlb' ? $buyerData : array('name'=>$buyerData['name'], 'surname'=>$buyerData['surname'], 'email'=>$buyerData['email']);
    foreach($buyerArray as $name => $value) {
        ?>
            <input type="hidden" name="cart_<?php echo $name; ?>" value="<?php echo $value; ?>" />
        <?php
    }
    ?>
        </form>
    <?php
    return ob_get_clean();
}


/**
 * @param string $token
 * @param array $productData
 * @param bool $sandbox (sandbox mode status)
 * @return string URL
 */
function getPaymentLink($token, array $productData, $sandbox=FALSE){
    if (!$token)
        return FALSE;
    $url = parse_url(MERCADOPAGO_BASE_URL . "checkout/preferences?access_token={$token}");
    $data = json_encode($productData);
    $query = isset($url['query']) ? "?{$url['query']}" : '';
    if ($fp = fsockopen('sslv3://'.$url['host'], 443)) {
        fwrite($fp, "POST {$url['path']}{$query} HTTP/1.0\r\n");
        fwrite($fp, "Host: {$url['host']}\r\n");
        fwrite($fp, "Accept: application/json\r\n");
        fwrite($fp, "Content-type: application/json\r\n");
        fwrite($fp, "Content-length: " . strlen($data) . "\r\n");
        fwrite($fp, "Connection: close\r\n\r\n");
        fwrite($fp, $data);
        $result = '';
        while(!feof($fp)) {
            $result .= fgets($fp);
        }
        fclose($fp);
        $response = explode("\r\n\r\n", trim($result));
        $json = substr($response[1], strpos($response[1], '{'), strrpos($response[1], '}')-strpos($response[1], '{')+1);
        //**/die($json.print_r($productData, TRUE));
        $parsedJson = json_decode($json, TRUE);
        $init = $sandbox ? 'sandbox_init_point' : 'init_point';
        return (count($parsedJson) && isset($parsedJson[$init])) ? $parsedJson[$init] : NULL;
    } else return FALSE;
}

?>
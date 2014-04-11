<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 14:15:27
         compiled from "/Applications/MAMP/htdocs/soona/modules/paypalusa/views/templates/hook/express-checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185046551153483f4ff18012-11234370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63a2ef8b2c8afec6933fc1c7a519b563f1f2541' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/modules/paypalusa/views/templates/hook/express-checkout.tpl',
      1 => 1397145812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185046551153483f4ff18012-11234370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'paypal_usa_express_checkout_no_token' => 0,
    'paypal_usa_express_checkout_hook_payment' => 0,
    'paypal_usa_action_payment' => 0,
    'paypal_usa_merchant_country_is_mx' => 0,
    'module_dir' => 0,
    'lang_iso' => 0,
    'paypal_usa_action' => 0,
    'paypal_usa_from_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53483f5031e9d3_08340682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53483f5031e9d3_08340682')) {function content_53483f5031e9d3_08340682($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['page_name']->value=='order'&&(!isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)||!$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)&&((isset($_GET['step'])&&$_GET['step']>1)||(isset($_POST['step'])&&$_POST['step']>1)))||($_smarty_tpl->tpl_vars['page_name']->value=='order-opc'&&isset($_GET['isPaymentStep'])&&$_GET['isPaymentStep']==true&&isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_hook_payment']->value))){?>	<p class="payment_module">	<div id="paypal-express-checkout">		<form id="paypal-express-checkout-form" action="<?php echo $_smarty_tpl->tpl_vars['paypal_usa_action_payment']->value;?>
" method="post">			<?php if ($_smarty_tpl->tpl_vars['paypal_usa_merchant_country_is_mx']->value){?>				<input id="paypal-express-checkout-btn" type="image" name="submit" src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
img/boton_terminar_compra.png" alt="" style="vertical-align: middle; margin-right: 10px;float: left;" /><p style="line-height: 50px; float: left;"><?php echo smartyTranslate(array('s'=>'Da clic para confirmar tu compra con PayPal','mod'=>'paypalusa'),$_smarty_tpl);?>
</p>				<div style="clear: both;"></div>			<?php }else{ ?>					<input id="paypal-express-checkout-btn" type="image" name="submit" src="https://www.paypalobjects.com/<?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='en'){?>en_US<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='fr'){?>fr_CA<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='es'){?>es_ES<?php }else{ ?>en_US<?php }?><?php }?><?php }?>/i/bnr/horizontal_solution_PPeCheck.gif" alt="" style="vertical-align: middle; margin-right: 10px;" /> <?php echo smartyTranslate(array('s'=>'Complete your order with PayPal Express Checkout','mod'=>'paypalusa'),$_smarty_tpl);?>
			<?php }?>		</form>	</div></p><?php }else{ ?><?php if (isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)&&$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value){?><p class="payment_module"><?php }?><div id="paypal-express-checkout" >	<form id="paypal-express-checkout-form" action="<?php echo $_smarty_tpl->tpl_vars['paypal_usa_action']->value;?>
" method="post" onsubmit="$('#paypal_express_checkout_id_product_attribute').val($('#idCombination').val());						$('#paypal_express_checkout_quantity').val($('#quantity_wanted').val());">		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'&&isset($_GET['id_product'])){?>			<input type="hidden" id="paypal_express_checkout_id_product" name="paypal_express_checkout_id_product" value="<?php echo intval($_GET['id_product']);?>
" />			<input type="hidden" id="paypal_express_checkout_id_product_attribute" name="paypal_express_checkout_id_product_attribute" value="0" />			<input type="hidden" id="paypal_express_checkout_quantity" name="paypal_express_checkout_quantity" value="0" />		<?php }?>		<?php if ($_smarty_tpl->tpl_vars['paypal_usa_merchant_country_is_mx']->value){?>			<input id="paypal-express-checkout-btn-product" type="image" name="submit" src="<?php if (isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)&&$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value){?><?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/img/accpmark_tarjdeb_mx.png<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/img/express_checkout_mx.png<?php }?>" alt="" style="float: left;"/>		<?php }else{ ?>			<input id="paypal-express-checkout-btn-product" type="image" name="submit" src="<?php if (isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)&&$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value){?>https://www.paypalobjects.com/<?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='en'){?>en_US<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='fr'){?>fr_CA<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='es'){?>es_ES<?php }else{ ?>en_US<?php }?><?php }?><?php }?>/i/bnr/horizontal_solution_PPeCheck.gif<?php }else{ ?>https://www.paypal.com/<?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='en'){?>en_US<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='fr'){?>fr_CA<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['lang_iso']->value=='es'){?>es_ES<?php }else{ ?>en_US<?php }?><?php }?><?php }?>/i/btn/btn_xpressCheckout.gif<?php }?>" alt="" />		<?php }?>	</form></div><div style="clear: both;"></div><?php if (isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)&&$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value){?></p><?php }?><?php if (!isset($_smarty_tpl->tpl_vars['paypal_usa_from_error']->value)){?><script type="text/javascript">			$(document).ready(function()		{		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'){?>						$('#paypal-express-checkout-form').insertAfter('#buy_block');				$('#paypal-express-checkout-btn-product').css('float', 'left');				$('#paypal-express-checkout-btn-product').css('margin-top', '-30px');			<?php }else{ ?>		<?php if (!isset($_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value)||!$_smarty_tpl->tpl_vars['paypal_usa_express_checkout_no_token']->value){?>								$('#paypal-express-checkout-btn-product').hide();					$('#paypal-express-checkout').insertBefore('.cart_navigation .button_large');					$('#paypal-express-checkout-btn-product').css('float', 'right');					$('#paypal-express-checkout-btn-product').css('margin-right', '5px');					$('.cart_navigation .button_large').css('margin-left', '5px');					$('#paypal-express-checkout-btn-product').show();					<?php }?>	<?php }?>			});	</script><?php }?><?php }?><?php }} ?>
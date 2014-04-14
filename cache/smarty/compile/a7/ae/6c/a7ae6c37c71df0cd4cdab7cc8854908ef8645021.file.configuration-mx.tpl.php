<?php /* Smarty version Smarty-3.1.14, created on 2014-02-11 16:17:33
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/paypalusa/views/templates/admin/configuration-mx.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67232978952faa17d1c7c59-50439005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ae6c37c71df0cd4cdab7cc8854908ef8645021' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/paypalusa/views/templates/admin/configuration-mx.tpl',
      1 => 1392069223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67232978952faa17d1c7c59-50439005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'paypal_usa_tracking' => 0,
    'module_dir' => 0,
    'paypal_usa_validation' => 0,
    'validation' => 0,
    'paypal_usa_error' => 0,
    'error' => 0,
    'paypal_usa_form_link' => 0,
    'paypal_usa_configuration' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52faa17d34c867_65535207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52faa17d34c867_65535207')) {function content_52faa17d34c867_65535207($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>
<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_tracking']->value, 'htmlall', 'UTF-8');?>
" alt="" style="display: none;" />
<div class="paypal_usa-module-wrapper">
	<div class="paypal_usa-module-header">
		<a rel="external" href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_registration-run&from=prestashop" target="_blank"><img class="paypal_usa-logo" alt="" src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/img/logo.png" /></a>
		<span class="paypal_usa-module-intro"><?php echo smartyTranslate(array('s'=>'PayPal is the #1 solution to start accepting payments on the web today','mod'=>'paypalusa'),$_smarty_tpl);?>
.<br />
		<span class="paypal_usa-module-singup-text"><?php echo smartyTranslate(array('s'=>'If you don\'t have a PayPal account','mod'=>'paypalusa'),$_smarty_tpl);?>
.</span>
		<a class="paypal_usa-module-create-btn" rel="external" href="https://www.paypal.com/mx/webapps/mpp/referral/paypal-business-account2?partner_id=XYAYGKRUJMJTG" target="_blank"><span><?php echo smartyTranslate(array('s'=>'Sign up for a PayPal account here','mod'=>'paypalusa'),$_smarty_tpl);?>
</span></a></span>
	</div>
	<div class="paypal_usa-module-wrap">
		<div class="paypal_usa-module-col1-mx L">
			<h3><?php echo smartyTranslate(array('s'=>'Credit and Debit Cards','mod'=>'paypalusa'),$_smarty_tpl);?>
</h3>
			<p><?php echo smartyTranslate(array('s'=>'With PayPal you can accept payments with all major credit and debit cards in 25 currencies from 190 countries.','mod'=>'paypalusa'),$_smarty_tpl);?>
</p>
			
		</div>
		<div class="paypal_usa-module-col1-mx R">
			<h3><?php echo smartyTranslate(array('s'=>'Monthly Payments Feature','mod'=>'paypalusa'),$_smarty_tpl);?>
</h3>
			<p><?php echo smartyTranslate(array('s'=>'Offer to your clients the possibility to make monthly payments using the following credit cards: Bancomer, Banamex, HSBC, Santander y Banorte.','mod'=>'paypalusa'),$_smarty_tpl);?>
</p>
			<img class="paypal_usa-cc" alt="" src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/img/accpmark_tarjdeb_mx.png" style="margin-top: 15px;" />
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['paypal_usa_validation']->value){?>
		<div class="conf">
			<?php  $_smarty_tpl->tpl_vars['validation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['validation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paypal_usa_validation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['validation']->key => $_smarty_tpl->tpl_vars['validation']->value){
$_smarty_tpl->tpl_vars['validation']->_loop = true;
?>
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['validation']->value, 'htmlall', 'UTF-8');?>
<br />
			<?php } ?>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['paypal_usa_error']->value){?>
		<div class="error">
			<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paypal_usa_error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
				<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['error']->value, 'htmlall', 'UTF-8');?>
<br />
			<?php } ?>
		</div>
	<?php }?>
	<form action="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_form_link']->value, 'htmlall', 'UTF-8');?>
" method="post">
		<fieldset>
			<legend><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
img/settings.gif" alt="" /><span><?php echo smartyTranslate(array('s'=>'PayPal PayPal Express Checkout API Settings','mod'=>'paypalusa'),$_smarty_tpl);?>
</span></legend>
			<label for="paypal_usa_sandbox_on"><?php echo smartyTranslate(array('s'=>'Mode','mod'=>'paypalusa'),$_smarty_tpl);?>
</label>
			<div class="margin-form PT4">
				<input type="radio" name="paypal_usa_sandbox" id="paypal_usa_sandbox_on" value="0"<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_SANDBOX']==0){?> checked="checked"<?php }?> /> <label for="paypal_usa_sandbox_on" class="resetLabel"><?php echo smartyTranslate(array('s'=>'Live','mod'=>'paypalusa'),$_smarty_tpl);?>
</label>
				<input type="radio" name="paypal_usa_sandbox" id="paypal_usa_sandbox_off" value="1"<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_SANDBOX']==1){?> checked="checked"<?php }?> /> <label for="paypal_usa_sandbox_off" class="resetLabel"><?php echo smartyTranslate(array('s'=>'Test (Sandbox)','mod'=>'paypalusa'),$_smarty_tpl);?>
</label>
				<p><?php echo smartyTranslate(array('s'=>'Use the links below to retreive your PayPal API credentials:','mod'=>'paypalusa'),$_smarty_tpl);?>
<br />
				<a onclick="window.open(this.href, '1369346829804', 'width=415,height=530,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');
					return false;" href="https://www.paypal.com/us/cgibin/webscr?cmd=_get-api-signature&generic-flow=true" class="paypal_usa-module-btn"><?php echo smartyTranslate(array('s'=>'Live Mode API','mod'=>'paypalusa'),$_smarty_tpl);?>
</a>&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp;&nbsp;<a onclick="window.open(this.href, '1369346829804', 'width=415,height=530,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');
					return false;" href="https://www.sandbox.paypal.com/us/cgi-bin/webscr?cmd=_get-api-signature&generic-flow=true" class="paypal_usa-module-btn"><?php echo smartyTranslate(array('s'=>'Sandbox Mode API','mod'=>'paypalusa'),$_smarty_tpl);?>
</a></p>
			</div>
			<label for="paypal_usa_account"><?php echo smartyTranslate(array('s'=>'PayPal Business Account:','mod'=>'paypalusa'),$_smarty_tpl);?>
</label></td>
			<div class="margin-form">
				<input type="text" name="paypal_usa_account" style="width: 250px;" value="<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_ACCOUNT']){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_ACCOUNT'], 'htmlall', 'UTF-8');?>
<?php }?>" /> <sup>*</sup>
			</div>
			<label for="paypal_usa_api_username"><?php echo smartyTranslate(array('s'=>'PayPal API Username:','mod'=>'paypalusa'),$_smarty_tpl);?>
</label></td>
			<div class="margin-form">
				<input type="text" name="paypal_usa_api_username" style="width: 250px;" value="<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_USERNAME']){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_USERNAME'], 'htmlall', 'UTF-8');?>
<?php }?>" /> <sup>*</sup>
			</div>
			<label for="paypal_usa_api_password"><?php echo smartyTranslate(array('s'=>'PayPal API Password:','mod'=>'paypalusa'),$_smarty_tpl);?>
</label></td>
			<div class="margin-form">
				<input type="password" name="paypal_usa_api_password" style="width: 250px;" value="<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_PASSWORD']){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_PASSWORD'], 'htmlall', 'UTF-8');?>
<?php }?>" /> <sup>*</sup>
			</div>
			<label for="paypal_usa_api_signature"><?php echo smartyTranslate(array('s'=>'PayPal API Signature:','mod'=>'paypalusa'),$_smarty_tpl);?>
</label></td>
			<div class="margin-form">
				<input type="password" name="paypal_usa_api_signature" style="width: 250px;" value="<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_SIGNATURE']){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_API_SIGNATURE'], 'htmlall', 'UTF-8');?>
<?php }?>" /> <sup>*</sup>
			</div>
			<input type="hidden" name="paypal_usa_express_checkout" value="1" />
			<h4 class="sep-title"><?php echo smartyTranslate(array('s'=>'PayPal Express Checkout button settings:','mod'=>'paypalusa'),$_smarty_tpl);?>
</h4>
			<label for="paypal_usa_checkbox_product"><?php echo smartyTranslate(array('s'=>'Display button on','mod'=>'paypalusa'),$_smarty_tpl);?>
</label>
			<div class="margin-form PT2">
				<input type="checkbox" name="paypal_usa_checkbox_product"<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_EXP_CHK_PRODUCT']){?> checked="checked"<?php }?> /> <label for="paypal_usa_checkbox_product" class="resetLabel"><?php echo smartyTranslate(array('s'=>'Product page','mod'=>'paypalusa'),$_smarty_tpl);?>
</label> 
				<input type="checkbox" name="paypal_usa_checkbox_shopping_cart"<?php if ($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_EXP_CHK_SHOPPING_CART']){?> checked="checked"<?php }?> /> <label for="paypal_usa_checkbox_shopping_cart}" class="resetLabel"><?php echo smartyTranslate(array('s'=>'Shopping Cart','mod'=>'paypalusa'),$_smarty_tpl);?>
</label>
			</div>
			<label for="paypal_usa_checkbox_border_color"><?php echo smartyTranslate(array('s'=>'Button border color','mod'=>'paypalusa'),$_smarty_tpl);?>
</label></td>
			<div class="margin-form">
				<input class="colorSelector" type="text" id="paypal_usa_checkbox_border_color" name="paypal_usa_checkbox_border_color" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['paypal_usa_configuration']->value['PAYPAL_USA_EXP_CHK_BORDER_COLOR'], 'htmlall', 'UTF-8');?>
" />
			</div>
			<div class="margin-form">
				<input type="submit" name="SubmitBasicSettings" class="button" value="<?php echo smartyTranslate(array('s'=>'Save settings','mod'=>'paypalusa'),$_smarty_tpl);?>
" />
			</div>
			<span class="small"><sup style="color: red;">*</sup> <?php echo smartyTranslate(array('s'=>'Required fields','mod'=>'paypalusa'),$_smarty_tpl);?>
</span>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
	
		$(document).ready(function() {
			$('#content table.table tbody tr th span').html('paypalmx');
		});
	
</script><?php }} ?>
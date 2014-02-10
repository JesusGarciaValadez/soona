<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 17:57:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139917053852f4217f5f20f1-12444876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a16eed9455a3f16e7b6e6a80b6923cb8f9ae37a8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1390233260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139917053852f4217f5f20f1-12444876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f4217f5f8735_83281203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f4217f5f8735_83281203')) {function content_52f4217f5f8735_83281203($_smarty_tpl) {?>

<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3><?php echo smartyTranslate(array('s'=>'Customer data privacy','mod'=>'blockcustomerprivacy'),$_smarty_tpl);?>
</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" autocomplete="off"/>				
	</p>
	<label for="customer_privacy"><?php echo $_smarty_tpl->tpl_vars['privacy_message']->value;?>
</label>		
</fieldset><?php }} ?>
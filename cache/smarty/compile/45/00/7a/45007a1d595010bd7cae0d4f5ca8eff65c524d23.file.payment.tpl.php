<?php /* Smarty version Smarty-3.1.14, created on 2014-02-12 12:48:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/cashondelivery/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194684918752fbc1f13d34b9-56025103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45007a1d595010bd7cae0d4f5ca8eff65c524d23' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/cashondelivery/views/templates/hook/payment.tpl',
      1 => 1392069222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194684918752fbc1f13d34b9-56025103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path_cod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52fbc1f13f7f85_62301706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fbc1f13f7f85_62301706')) {function content_52fbc1f13f7f85_62301706($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('cashondelivery','validation',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>
" rel="nofollow">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_cod']->value;?>
cashondelivery.gif" alt="<?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>
" style="float:left;" />
		<br /><?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<br /><?php echo smartyTranslate(array('s'=>'You pay for the merchandise upon delivery','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<br style="clear:both;" />
	</a>
</p><?php }} ?>
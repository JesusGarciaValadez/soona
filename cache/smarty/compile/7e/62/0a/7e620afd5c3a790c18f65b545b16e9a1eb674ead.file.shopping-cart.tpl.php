<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 17:54:41
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/loyalty/views/templates/hook/shopping-cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156124895552f420c1014065-78471983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e620afd5c3a790c18f65b545b16e9a1eb674ead' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/loyalty/views/templates/hook/shopping-cart.tpl',
      1 => 1390233262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156124895552f420c1014065-78471983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_template_dir' => 0,
    'points' => 0,
    'voucher' => 0,
    'guest_checkout' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f420c10496c7_21353028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f420c10496c7_21353028')) {function content_52f420c10496c7_21353028($_smarty_tpl) {?>

<!-- MODULE Loyalty -->
<p id="loyalty">
	<img src="<?php echo $_smarty_tpl->tpl_vars['module_template_dir']->value;?>
images/loyalty.gif" alt="<?php echo smartyTranslate(array('s'=>'loyalty','mod'=>'loyalty'),$_smarty_tpl);?>
" class="icon" />
	<?php if ($_smarty_tpl->tpl_vars['points']->value>0){?>
		<?php echo smartyTranslate(array('s'=>'By checking out this shopping cart you can collect up to','mod'=>'loyalty'),$_smarty_tpl);?>
 <b>
		<?php if ($_smarty_tpl->tpl_vars['points']->value>1){?><?php echo smartyTranslate(array('s'=>'%d loyalty points','sprintf'=>$_smarty_tpl->tpl_vars['points']->value,'mod'=>'loyalty'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'%d loyalty point','sprintf'=>$_smarty_tpl->tpl_vars['points']->value,'mod'=>'loyalty'),$_smarty_tpl);?>
<?php }?></b>
		<?php echo smartyTranslate(array('s'=>'that can be converted into a voucher of','mod'=>'loyalty'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['voucher']->value),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['guest_checkout']->value)&&$_smarty_tpl->tpl_vars['guest_checkout']->value){?><sup>*</sup><?php }?>.<br />
		<?php if (isset($_smarty_tpl->tpl_vars['guest_checkout']->value)&&$_smarty_tpl->tpl_vars['guest_checkout']->value){?><sup>*</sup> <?php echo smartyTranslate(array('s'=>'Not available for Instant checkout order','mod'=>'loyalty'),$_smarty_tpl);?>
<?php }?>
	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'Add some products to your shopping cart to collect some loyalty points.','mod'=>'loyalty'),$_smarty_tpl);?>

	<?php }?>
</p>
<!-- END : MODULE Loyalty --><?php }} ?>
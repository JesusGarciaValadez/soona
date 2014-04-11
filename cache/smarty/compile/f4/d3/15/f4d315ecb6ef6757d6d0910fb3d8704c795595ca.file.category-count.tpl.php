<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 15:35:03
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:441765632534851f7adb5a5-70184726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4d315ecb6ef6757d6d0910fb3d8704c795595ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/category-count.tpl',
      1 => 1394482620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '441765632534851f7adb5a5-70184726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_534851f7b31ad9_80219811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534851f7b31ad9_80219811')) {function content_534851f7b31ad9_80219811($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<div class="resumecat category-product-count">
		<?php echo smartyTranslate(array('s'=>'There are no products in  this category'),$_smarty_tpl);?>

	</div>
<?php }else{ ?>
	<p class="item_count">
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
	</p>
<?php }?><?php }} ?>
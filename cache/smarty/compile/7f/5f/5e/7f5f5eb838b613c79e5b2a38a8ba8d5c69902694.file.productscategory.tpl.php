<?php /* Smarty version Smarty-3.1.14, created on 2014-02-07 14:45:34
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/productscategory/productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33376796552f545eebc1d79-24277244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f5f5eb838b613c79e5b2a38a8ba8d5c69902694' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/productscategory/productscategory.tpl',
      1 => 1383864388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33376796552f545eebc1d79-24277244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryProducts' => 0,
    'productCount' => 0,
    'sliderFor' => 0,
    'categoryProduct' => 0,
    'link' => 0,
    'ProdDisplayPrice' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f545eec478a2_52236991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f545eec478a2_52236991')) {function content_52f545eec478a2_52236991($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>

<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false){?>
<div class="clearfix blockproductscategory block products_block">
	<p class="productscategory_h2 title_block"><?php echo count($_smarty_tpl->tpl_vars['categoryProducts']->value);?>
 <?php echo smartyTranslate(array('s'=>'other products in the same category:','mod'=>'productscategory'),$_smarty_tpl);?>
</p>
	<div id="productscategory_productblock">
	<div id="productscategory_productlist">

			<!-- Megnor start -->
			<?php $_smarty_tpl->tpl_vars['sliderFor'] = new Smarty_variable(5, null, 0);?> <!-- Define Number of product for SLIDER -->
			<?php $_smarty_tpl->tpl_vars['productCount'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['categoryProducts']->value), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>
			<div class="customNavigation">
				<a class="btn prev">&nbsp;</a>
				<a class="btn next">&nbsp;</a>
			</div>
			<?php }?>
			<!-- Megnor End -->
	
		<ul id="<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>productscategory-carousel<?php }else{ ?>productscategory-grid<?php }?>" class="<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>product-carousel<?php }else{ ?>product_list<?php }?> clearfix">
			<?php  $_smarty_tpl->tpl_vars['categoryProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryProduct']->key => $_smarty_tpl->tpl_vars['categoryProduct']->value){
$_smarty_tpl->tpl_vars['categoryProduct']->_loop = true;
?>
			<li  class="<?php if ($_smarty_tpl->tpl_vars['productCount']->value>=$_smarty_tpl->tpl_vars['sliderFor']->value){?>slider-item<?php }?>">
<!-- Megnor Start -->
	<div class="product-block">
		<div class="product-inner">
<!-- Megnor End -->					
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']);?>
" class="lnk_img" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['id_image'],'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
" />
				</a>
				<p class="product_name">
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['categoryProduct']->value['name'],14,'...'), 'htmlall', 'UTF-8');?>
</a>
				</p>
				<?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['categoryProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
				<p class="price_display">
					<span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>
</span>
				</p>
				<?php }else{ ?>
				
				<?php }?>
<!-- Megnor Start -->
</div>
</div>
<!-- Megnor End -->					
			</li>
			<?php } ?>
		</ul>
	</div>
	
	</div>
	<span class="productcategory_default_width" style="display:none; visibility:hidden"></span>
	
</div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:46:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196812297952f948d0b08825-35341847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a4867a0a42a4bec3837a0a8783a314bc47bbad9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1390850579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196812297952f948d0b08825-35341847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f948d0c66839_14077567',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f948d0c66839_14077567')) {function content_52f948d0c66839_14077567($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),true));?>
';
	var favorite_products_url_remove = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),true));?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>
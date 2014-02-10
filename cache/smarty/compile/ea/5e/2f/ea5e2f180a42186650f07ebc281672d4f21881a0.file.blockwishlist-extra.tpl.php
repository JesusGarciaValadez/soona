<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 18:03:44
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3223207552f422e0124414-48669689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea5e2f180a42186650f07ebc281672d4f21881a0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1390947219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3223207552f422e0124414-48669689',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f422e0172381_68075128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f422e0172381_68075128')) {function content_52f422e0172381_68075128($_smarty_tpl) {?>

<p class="buttons_bottom_block">
	<a href="#" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;"  title="<?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
" rel="nofollow">&raquo; <?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
</p>
<?php }} ?>
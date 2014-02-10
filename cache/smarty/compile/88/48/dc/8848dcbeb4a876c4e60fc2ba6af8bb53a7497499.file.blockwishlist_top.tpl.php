<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 19:15:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockwishlist/blockwishlist_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142215821352f433b1d01e38-73982911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8848dcbeb4a876c4e60fc2ba6af8bb53a7497499' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockwishlist/blockwishlist_top.tpl',
      1 => 1390947219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142215821352f433b1d01e38-73982911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f433b1d09b45_12677901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f433b1d09b45_12677901')) {function content_52f433b1d09b45_12677901($_smarty_tpl) {?>

<script type="text/javascript">
	var isLoggedWishlist = <?php if ($_smarty_tpl->tpl_vars['logged']->value){?>true<?php }else{ ?>false<?php }?>;
</script><?php }} ?>
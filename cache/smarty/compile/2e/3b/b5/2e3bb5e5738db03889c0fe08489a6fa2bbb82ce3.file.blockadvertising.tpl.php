<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:01
         compiled from "/Applications/MAMP/htdocs/soona/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76314314453485b196f28d8-35697404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e3bb5e5738db03889c0fe08489a6fa2bbb82ce3' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/modules/blockadvertising/blockadvertising.tpl',
      1 => 1394482380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76314314453485b196f28d8-35697404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53485b19716474_88783672',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b19716474_88783672')) {function content_53485b19716474_88783672($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>
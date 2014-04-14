<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:852429188531ea44bbfb5d7-33981207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7f3961f11bbec55c77485b8d817f7fa7fb299b9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockadvertising/blockadvertising.tpl',
      1 => 1392270663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '852429188531ea44bbfb5d7-33981207',
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
  'unifunc' => 'content_531ea44bc0bab2_94379631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44bc0bab2_94379631')) {function content_531ea44bc0bab2_94379631($_smarty_tpl) {?>

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
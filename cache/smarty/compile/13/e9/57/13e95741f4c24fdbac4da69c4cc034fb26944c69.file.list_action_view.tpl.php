<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 17:41:19
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25550716553471e0f721c99-19289364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13e95741f4c24fdbac4da69c4cc034fb26944c69' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1394483160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25550716553471e0f721c99-19289364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53471e0f73e958_89418616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53471e0f73e958_89418616')) {function content_53471e0f73e958_89418616($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<img src="../img/admin/details.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
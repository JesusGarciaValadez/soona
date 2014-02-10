<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 11:35:11
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160424778352f3c7cf79fd65-60451454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6f111a83530c50ade9269419f69f6b26212b754' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1390233260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160424778352f3c7cf79fd65-60451454',
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
  'unifunc' => 'content_52f3c7cf7adef9_54493406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3c7cf7adef9_54493406')) {function content_52f3c7cf7adef9_54493406($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
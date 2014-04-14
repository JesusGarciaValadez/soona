<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:55:00
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11600298525346bed48d2909-88205756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a04301e8670d14ba62681a714dbfb018bd95aae' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/controllers/cms_content/content.tpl',
      1 => 1394482980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11600298525346bed48d2909-88205756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5346bed4a5e986_57070208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346bed4a5e986_57070208')) {function content_5346bed4a5e986_57070208($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>
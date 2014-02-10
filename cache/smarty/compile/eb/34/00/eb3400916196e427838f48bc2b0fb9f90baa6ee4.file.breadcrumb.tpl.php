<?php /* Smarty version Smarty-3.1.14, created on 2014-02-07 14:45:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209335720252f545efaaa323-24934865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb3400916196e427838f48bc2b0fb9f90baa6ee4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/breadcrumb.tpl',
      1 => 1379802144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209335720252f545efaaa323-24934865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir' => 0,
    'img_dir' => 0,
    'path' => 0,
    'category' => 0,
    'navigationPipe' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f545efae4372_59934663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f545efae4372_59934663')) {function content_52f545efae4372_59934663($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>

<!-- Breadcrumb -->
<?php if (isset(Smarty::$_smarty_vars['capture']['path'])){?><?php $_smarty_tpl->tpl_vars['path'] = new Smarty_variable(Smarty::$_smarty_vars['capture']['path'], null, 0);?><?php }?>
<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#" id="brd-crumbs">
	<a property="v:title" rel="v:url" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Return to Home'),$_smarty_tpl);?>
">
		<!--<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/home.gif" height="26" width="26" alt="<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
" />-->
		<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

	</a>
	<?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value){?>
		<span class="navigation-pipe" <?php if (isset($_smarty_tpl->tpl_vars['category']->value)&&isset($_smarty_tpl->tpl_vars['category']->value->id_category)&&$_smarty_tpl->tpl_vars['category']->value->id_category==1){?>style="display:none;"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['navigationPipe']->value, 'html', 'UTF-8');?>
</span>
		<?php if (!strpos($_smarty_tpl->tpl_vars['path']->value,'span')){?>
			<span class="navigation_page"><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</span>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['path']->value;?>

		<?php }?>
	<?php }?>
</div>
<!-- /Breadcrumb --><?php }} ?>
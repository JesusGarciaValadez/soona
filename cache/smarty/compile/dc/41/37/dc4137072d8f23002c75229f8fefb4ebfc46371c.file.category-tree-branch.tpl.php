<<<<<<< HEAD:cache/smarty/compile/98/36/e7/9836e7d73df79f0cc0ea3c4700d41f1dbbd5a36b.file.category-tree-branch.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockcategories/category-tree-branch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1292094793531ea44b7a9c63-86050859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:00
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/modules/blockcategories/category-tree-branch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211412904753485b18cc6646-03884150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/dc/41/37/dc4137072d8f23002c75229f8fefb4ebfc46371c.file.category-tree-branch.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc4137072d8f23002c75229f8fefb4ebfc46371c' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/98/36/e7/9836e7d73df79f0cc0ea3c4700d41f1dbbd5a36b.file.category-tree-branch.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockcategories/category-tree-branch.tpl',
      1 => 1392270667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1292094793531ea44b7a9c63-86050859',
=======
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/modules/blockcategories/category-tree-branch.tpl',
      1 => 1394482860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211412904753485b18cc6646-03884150',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/dc/41/37/dc4137072d8f23002c75229f8fefb4ebfc46371c.file.category-tree-branch.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'last' => 0,
    'node' => 0,
    'currentCategoryId' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/98/36/e7/9836e7d73df79f0cc0ea3c4700d41f1dbbd5a36b.file.category-tree-branch.tpl.php
  'unifunc' => 'content_531ea44b8316c0_80088015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44b8316c0_80088015')) {function content_531ea44b8316c0_80088015($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
=======
  'unifunc' => 'content_53485b18dbc650_88224046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b18dbc650_88224046')) {function content_53485b18dbc650_88224046($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/MAMP/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/dc/41/37/dc4137072d8f23002c75229f8fefb4ebfc46371c.file.category-tree-branch.tpl.php
?>

<li <?php if (isset($_smarty_tpl->tpl_vars['last']->value)&&$_smarty_tpl->tpl_vars['last']->value=='true'){?>class="last"<?php }?>>
	<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['node']->value['link'], 'htmlall', 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['currentCategoryId']->value)&&$_smarty_tpl->tpl_vars['node']->value['id']==$_smarty_tpl->tpl_vars['currentCategoryId']->value){?>class="selected"<?php }?>
		title="<?php echo smarty_modifier_escape(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['node']->value['desc'])), 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['node']->value['name'], 'htmlall', 'UTF-8');?>
</a>
	<?php if (count($_smarty_tpl->tpl_vars['node']->value['children'])>0){?>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['node']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryTreeBranch']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categoryTreeBranch']['last']){?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0);?>

			<?php }else{ ?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'false'), 0);?>

			<?php }?>
		<?php } ?>
		</ul>
	<?php }?>
</li>
<?php }} ?>
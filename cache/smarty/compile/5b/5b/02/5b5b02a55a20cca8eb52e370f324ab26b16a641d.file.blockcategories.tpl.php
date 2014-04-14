<<<<<<< HEAD:cache/smarty/compile/ce/c1/a0/cec1a036f4e9692cebc0c24f117b1b6747003734.file.blockcategories.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockcategories/blockcategories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:807131919531ea44b741129-05622565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:00
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/modules/blockcategories/blockcategories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89459644953485b18c511f9-51995218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/5b/5b/02/5b5b02a55a20cca8eb52e370f324ab26b16a641d.file.blockcategories.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b5b02a55a20cca8eb52e370f324ab26b16a641d' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/ce/c1/a0/cec1a036f4e9692cebc0c24f117b1b6747003734.file.blockcategories.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blockcategories/blockcategories.tpl',
      1 => 1392270667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '807131919531ea44b741129-05622565',
=======
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/modules/blockcategories/blockcategories.tpl',
      1 => 1394482860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89459644953485b18c511f9-51995218',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/5b/5b/02/5b5b02a55a20cca8eb52e370f324ab26b16a641d.file.blockcategories.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isDhtml' => 0,
    'blockCategTree' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/ce/c1/a0/cec1a036f4e9692cebc0c24f117b1b6747003734.file.blockcategories.tpl.php
  'unifunc' => 'content_531ea44b79f320_41160527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44b79f320_41160527')) {function content_531ea44b79f320_41160527($_smarty_tpl) {?>
=======
  'unifunc' => 'content_53485b18cb6900_16045063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b18cb6900_16045063')) {function content_53485b18cb6900_16045063($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/5b/5b/02/5b5b02a55a20cca8eb52e370f324ab26b16a641d.file.blockcategories.tpl.php

<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<p class="title_block"><?php echo smartyTranslate(array('s'=>'Categories','mod'=>'blockcategories'),$_smarty_tpl);?>
</p>
	<div class="block_content">
		<ul class="tree <?php if ($_smarty_tpl->tpl_vars['isDhtml']->value){?>dhtml<?php }?>">
		<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blockCategTree']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['blockCategTree']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
			<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['blockCategTree']['last']){?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'last'=>'true'), 0);?>

			<?php }else{ ?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['branche_tpl_path']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('node'=>$_smarty_tpl->tpl_vars['child']->value), 0);?>

			<?php }?>
		<?php } ?>
		</ul>
		
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php }} ?>
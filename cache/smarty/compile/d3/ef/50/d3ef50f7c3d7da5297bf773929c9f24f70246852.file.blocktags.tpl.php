<<<<<<< HEAD:cache/smarty/compile/db/17/b9/db17b946908ef16ab40965db33a9350eabaf9cd7.file.blocktags.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blocktags/blocktags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:503382852531ea44b682307-87078088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:00
         compiled from "/Applications/MAMP/htdocs/soona/modules/blocktags/blocktags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85633457053485b18b5c7f7-91820013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/d3/ef/50/d3ef50f7c3d7da5297bf773929c9f24f70246852.file.blocktags.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3ef50f7c3d7da5297bf773929c9f24f70246852' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/db/17/b9/db17b946908ef16ab40965db33a9350eabaf9cd7.file.blocktags.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blocktags/blocktags.tpl',
      1 => 1392270664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '503382852531ea44b682307-87078088',
=======
      0 => '/Applications/MAMP/htdocs/soona/modules/blocktags/blocktags.tpl',
      1 => 1394482560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85633457053485b18b5c7f7-91820013',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/d3/ef/50/d3ef50f7c3d7da5297bf773929c9f24f70246852.file.blocktags.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tag' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/db/17/b9/db17b946908ef16ab40965db33a9350eabaf9cd7.file.blocktags.tpl.php
  'unifunc' => 'content_531ea44b71ef26_71713334',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44b71ef26_71713334')) {function content_531ea44b71ef26_71713334($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
=======
  'unifunc' => 'content_53485b18c14534_43536408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b18c14534_43536408')) {function content_53485b18c14534_43536408($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/MAMP/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/d3/ef/50/d3ef50f7c3d7da5297bf773929c9f24f70246852.file.blocktags.tpl.php
?>

<!-- Block tags module -->
<div id="tags_block_left" class="block tags_block">
	<h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Tags','mod'=>'blocktags'),$_smarty_tpl);?>
</h4>
	<p class="block_content">
<?php if ($_smarty_tpl->tpl_vars['tags']->value){?>
	<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['tag']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['tag']->last;
?>
		<a href="<?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value['name']);?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,"tag=".$_tmp1), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'More about','mod'=>'blocktags'),$_smarty_tpl);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['tag']->value['name'], 'html', 'UTF-8');?>
" class="<?php echo $_smarty_tpl->tpl_vars['tag']->value['class'];?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }else{ ?>item<?php }?>"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['tag']->value['name'], 'html', 'UTF-8');?>
</a>
	<?php } ?>
<?php }else{ ?>
	<?php echo smartyTranslate(array('s'=>'No tags have been specified yet.','mod'=>'blocktags'),$_smarty_tpl);?>

<?php }?>
	</p>
</div>
<!-- /Block tags module -->
<?php }} ?>
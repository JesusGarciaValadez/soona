<<<<<<< HEAD:cache/smarty/compile/f2/71/26/f27126032096548fdb90a0da26535bbf03cf8a5c.file.list_action_delete.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:28
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:574959461531ea460f28569-30119966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:41:11
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16958445555346bb973d9f39-36073768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/ed/5f/5a/ed5f5ac2af87b297ed4aaf3d96f025a6068bfd2d.file.list_action_delete.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed5f5ac2af87b297ed4aaf3d96f025a6068bfd2d' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/f2/71/26/f27126032096548fdb90a0da26535bbf03cf8a5c.file.list_action_delete.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1392069215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '574959461531ea460f28569-30119966',
=======
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1394483160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16958445555346bb973d9f39-36073768',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/ed/5f/5a/ed5f5ac2af87b297ed4aaf3d96f025a6068bfd2d.file.list_action_delete.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/f2/71/26/f27126032096548fdb90a0da26535bbf03cf8a5c.file.list_action_delete.tpl.php
  'unifunc' => 'content_531ea460f3a600_76887169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea460f3a600_76887169')) {function content_531ea460f3a600_76887169($_smarty_tpl) {?>
=======
  'unifunc' => 'content_5346bb973ff0c3_75148219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346bb973ff0c3_75148219')) {function content_5346bb973ff0c3_75148219($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/ed/5f/5a/ed5f5ac2af87b297ed4aaf3d96f025a6068bfd2d.file.list_action_delete.tpl.php
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
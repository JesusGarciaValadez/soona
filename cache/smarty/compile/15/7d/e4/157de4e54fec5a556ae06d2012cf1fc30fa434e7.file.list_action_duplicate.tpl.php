<<<<<<< HEAD:cache/smarty/compile/3c/62/97/3c6297212507cf3ec15a6cac86d64a5f71232b20.file.list_action_duplicate.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:28
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1658159087531ea460f0ec45-19239485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:51:47
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12700005135346be13f06053-02893405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/15/7d/e4/157de4e54fec5a556ae06d2012cf1fc30fa434e7.file.list_action_duplicate.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '157de4e54fec5a556ae06d2012cf1fc30fa434e7' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/3c/62/97/3c6297212507cf3ec15a6cac86d64a5f71232b20.file.list_action_duplicate.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1392069215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1658159087531ea460f0ec45-19239485',
=======
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1394483160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12700005135346be13f06053-02893405',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/15/7d/e4/157de4e54fec5a556ae06d2012cf1fc30fa434e7.file.list_action_duplicate.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/3c/62/97/3c6297212507cf3ec15a6cac86d64a5f71232b20.file.list_action_duplicate.tpl.php
  'unifunc' => 'content_531ea460f1c661_35373219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea460f1c661_35373219')) {function content_531ea460f1c661_35373219($_smarty_tpl) {?>
=======
  'unifunc' => 'content_5346be13f29a65_38046555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346be13f29a65_38046555')) {function content_5346be13f29a65_38046555($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/15/7d/e4/157de4e54fec5a556ae06d2012cf1fc30fa434e7.file.list_action_duplicate.tpl.php
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
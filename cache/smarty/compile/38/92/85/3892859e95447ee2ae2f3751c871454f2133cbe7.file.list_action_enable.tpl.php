<<<<<<< HEAD:cache/smarty/compile/d7/b1/ba/d7b1ba4e4939aa273342f5b8263baa393a17eb09.file.list_action_enable.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_enable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:779794027531ea4610c9494-33769412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:51:48
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_enable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18850643065346be1405dfe1-89161503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/38/92/85/3892859e95447ee2ae2f3751c871454f2133cbe7.file.list_action_enable.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3892859e95447ee2ae2f3751c871454f2133cbe7' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/d7/b1/ba/d7b1ba4e4939aa273342f5b8263baa393a17eb09.file.list_action_enable.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_enable.tpl',
      1 => 1392069215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '779794027531ea4610c9494-33769412',
=======
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_action_enable.tpl',
      1 => 1394483160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18850643065346be1405dfe1-89161503',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/38/92/85/3892859e95447ee2ae2f3751c871454f2133cbe7.file.list_action_enable.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_enable' => 0,
    'confirm' => 0,
    'enabled' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/d7/b1/ba/d7b1ba4e4939aa273342f5b8263baa393a17eb09.file.list_action_enable.tpl.php
  'unifunc' => 'content_531ea4610e61d3_79842094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea4610e61d3_79842094')) {function content_531ea4610e61d3_79842094($_smarty_tpl) {?>
=======
  'unifunc' => 'content_5346be140a3ec8_56997275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346be140a3ec8_56997275')) {function content_5346be140a3ec8_56997275($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/38/92/85/3892859e95447ee2ae2f3751c871454f2133cbe7.file.list_action_enable.tpl.php

<a href="<?php echo $_smarty_tpl->tpl_vars['url_enable']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
');"<?php }?> title="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>">
	<img src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?>enabled.gif<?php }else{ ?>disabled.gif<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['enabled']->value){?><?php echo smartyTranslate(array('s'=>'Enabled'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Disabled'),$_smarty_tpl);?>
<?php }?>" />
</a>
<?php }} ?>
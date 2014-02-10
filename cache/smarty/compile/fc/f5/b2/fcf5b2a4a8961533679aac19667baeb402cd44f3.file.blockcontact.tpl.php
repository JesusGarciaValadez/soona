<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 15:40:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockcontact/blockcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61314219352f947331ca078-33206680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcf5b2a4a8961533679aac19667baeb402cd44f3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/blockcontact/blockcontact.tpl',
      1 => 1390849877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61314219352f947331ca078-33206680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'telnumber' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f9473324d697_01244116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f9473324d697_01244116')) {function content_52f9473324d697_01244116($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>

<div id="contact_block" class="block">
    <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Contact us','mod'=>'blockcontact'),$_smarty_tpl);?>
</h4>
    <div class="block_content clearfix">
            <p><?php echo smartyTranslate(array('s'=>'Our support hotline is available 24/7.','mod'=>'blockcontact'),$_smarty_tpl);?>
</p>
            <?php if ($_smarty_tpl->tpl_vars['telnumber']->value!=''){?><p class="tel"><span class="label"><?php echo smartyTranslate(array('s'=>'Phone:','mod'=>'blockcontact'),$_smarty_tpl);?>
</span><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['telnumber']->value, 'htmlall', 'UTF-8');?>
</p><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['email']->value!=''){?><a href="mailto:<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['email']->value, 'htmlall', 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Contact our expert support team!','mod'=>'blockcontact'),$_smarty_tpl);?>
</a><?php }?>
    </div>
</div>
<?php }} ?>
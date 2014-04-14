<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:14:01
         compiled from "/Applications/MAMP/htdocs/soona/modules/blockcontact/blockcontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175551468553485b19a884e7-90159043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ec8fee803656e97e8b7a4c0a89f9491441210f4' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/modules/blockcontact/blockcontact.tpl',
      1 => 1394482440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175551468553485b19a884e7-90159043',
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
  'unifunc' => 'content_53485b19ae6790_99612164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b19ae6790_99612164')) {function content_53485b19ae6790_99612164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/MAMP/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
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
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 14:17:35
         compiled from "/Applications/MAMP/htdocs/soona/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108386205853483fcf8c2155-75498422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91e9f8481ada0968ac206ed3d4f46fbd8c65844e' => 
    array (
      0 => '/Applications/MAMP/htdocs/soona/modules/blocksharefb/blocksharefb.tpl',
      1 => 1394482560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108386205853483fcf8c2155-75498422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53483fcf8e5123_12557907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53483fcf8e5123_12557907')) {function content_53483fcf8e5123_12557907($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>
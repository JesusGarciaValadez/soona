<?php /* Smarty version Smarty-3.1.14, created on 2014-02-10 12:39:12
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/mailalerts/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168813434752f91cd0465ae5-01128424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd80f54644f5ef4841c842a1a22f7a178fc71ac9c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/mailalerts/views/templates/hook/my-account.tpl',
      1 => 1390851042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168813434752f91cd0465ae5-01128424',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f91cd04c8265_15576504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f91cd04c8265_15576504')) {function content_52f91cd04c8265_15576504($_smarty_tpl) {?>

<li class="mailalerts">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('mailalerts','account'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My alerts','mod'=>'mailalerts'),$_smarty_tpl);?>
" rel="nofollow">
		<?php echo smartyTranslate(array('s'=>'My alerts','mod'=>'mailalerts'),$_smarty_tpl);?>

	</a>
</li>
<?php }} ?>
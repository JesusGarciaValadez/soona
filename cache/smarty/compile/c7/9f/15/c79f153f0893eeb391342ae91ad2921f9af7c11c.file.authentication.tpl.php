<?php /* Smarty version Smarty-3.1.14, created on 2014-02-06 17:57:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/modules/referralprogram/views/templates/hook/authentication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45064950552f4217f5d3a98-77984119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c79f153f0893eeb391342ae91ad2921f9af7c11c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/modules/referralprogram/views/templates/hook/authentication.tpl',
      1 => 1390850598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45064950552f4217f5d3a98-77984119',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52f4217f5e47f0_45188850',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f4217f5e47f0_45188850')) {function content_52f4217f5e47f0_45188850($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/soona/tools/smarty/plugins/modifier.escape.php';
?>

<!-- MODULE ReferralProgram -->
<fieldset class="account_creation">
	<h3><?php echo smartyTranslate(array('s'=>'Referral program','mod'=>'referralprogram'),$_smarty_tpl);?>
</h3>
	<p class="text">
		<label for="referralprogram"><?php echo smartyTranslate(array('s'=>'E-mail address of your sponsor','mod'=>'referralprogram'),$_smarty_tpl);?>
</label>
		<input type="text" size="52" maxlength="128" id="referralprogram" name="referralprogram" value="<?php if (isset($_POST['referralprogram'])){?><?php echo smarty_modifier_escape($_POST['referralprogram'], 'html', 'UTF-8');?>
<?php }?>" />
	</p>
</fieldset>
<!-- END : MODULE ReferralProgram --><?php }} ?>
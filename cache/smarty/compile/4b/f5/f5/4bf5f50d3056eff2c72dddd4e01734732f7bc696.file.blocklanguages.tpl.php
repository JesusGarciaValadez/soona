<<<<<<< HEAD:cache/smarty/compile/f8/eb/10/f8eb10439e7c63f1f217eced2b24c6b701d1ddd5.file.blocklanguages.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:06
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blocklanguages/blocklanguages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322879532531ea44a9bfb69-25001849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-11 16:13:59
         compiled from "/Applications/MAMP/htdocs/soona/themes/soona/modules/blocklanguages/blocklanguages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114939393453485b17b1c0f2-91071026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/4b/f5/f5/4bf5f50d3056eff2c72dddd4e01734732f7bc696.file.blocklanguages.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bf5f50d3056eff2c72dddd4e01734732f7bc696' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/f8/eb/10/f8eb10439e7c63f1f217eced2b24c6b701d1ddd5.file.blocklanguages.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/themes/soona/modules/blocklanguages/blocklanguages.tpl',
      1 => 1392270667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322879532531ea44a9bfb69-25001849',
=======
      0 => '/Applications/MAMP/htdocs/soona/themes/soona/modules/blocklanguages/blocklanguages.tpl',
      1 => 1394482860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114939393453485b17b1c0f2-91071026',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/4b/f5/f5/4bf5f50d3056eff2c72dddd4e01734732f7bc696.file.blocklanguages.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'lang_iso' => 0,
    'img_lang_dir' => 0,
    'indice_lang' => 0,
    'lang_rewrite_urls' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/f8/eb/10/f8eb10439e7c63f1f217eced2b24c6b701d1ddd5.file.blocklanguages.tpl.php
  'unifunc' => 'content_531ea44ab41d01_53801244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea44ab41d01_53801244')) {function content_531ea44ab41d01_53801244($_smarty_tpl) {?>
=======
  'unifunc' => 'content_53485b17c57380_90859392',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53485b17c57380_90859392')) {function content_53485b17c57380_90859392($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/4b/f5/f5/4bf5f50d3056eff2c72dddd4e01734732f7bc696.file.blocklanguages.tpl.php

<!-- Block languages module -->
<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
<div id="languages_block_top">
	<div id="countries">
	
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value){?>
		<p class="selected_language">
			<!--<img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" />-->
			<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

			<span class="top_downarrow">&nbsp;</span>
		</p>
	<?php }?>
<?php } ?>
		<ul id="first-languages" class="countries_ul">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			<li <?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value){?>class="selected_language"<?php }?>>
			<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value){?>
				<?php $_smarty_tpl->tpl_vars['indice_lang'] = new Smarty_variable($_smarty_tpl->tpl_vars['language']->value['id_lang'], null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value])){?>
					<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
">
				<?php }else{ ?>
					<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getLanguageLink($_smarty_tpl->tpl_vars['language']->value['id_lang']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
">

				<?php }?>
			<?php }?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" /><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>

			<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value){?>
				</a>
			<?php }?>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>



<script type="text/javascript">
// Megnor Start
	var lang_block = new HoverWatcher('#languages_block_top');
	var countries_ul = new HoverWatcher('.countries_ul');
	$("#languages_block_top").click(function() {
		$("#languages_block_top").addClass('active');
		$(".countries_ul").slideToggle('slow');
		setTimeout(function() {
			if (!lang_block.isHoveringOver() && !countries_ul.isHoveringOver())
				$(".countries_ul").stop(true, true).slideUp(450);
				$("#languages_block_top").removeClass('active');
		}, 4000);
	});
	$(".countries_ul").hover(function() {
		setTimeout(function() {
			if (!lang_block.isHoveringOver() && !countries_ul.isHoveringOver())
				$(".countries_ul").stop(true, true).slideUp(450);
		}, 4000);
	});
// Megnor End	
</script>

<?php }?>
<!-- /Block languages module -->
<?php }} ?>
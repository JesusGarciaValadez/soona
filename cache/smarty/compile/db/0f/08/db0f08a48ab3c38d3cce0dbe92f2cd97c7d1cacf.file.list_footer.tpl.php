<<<<<<< HEAD:cache/smarty/compile/0a/f9/dc/0af9dc94d486dc4cb12916bfa901ee80dce39ac9.file.list_footer.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:51:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2005558990531ea46148bed3-18783985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:41:11
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1914745915346bb978ebae5-55171294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/db/0f/08/db0f08a48ab3c38d3cce0dbe92f2cd97c7d1cacf.file.list_footer.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db0f08a48ab3c38d3cce0dbe92f2cd97c7d1cacf' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/0a/f9/dc/0af9dc94d486dc4cb12916bfa901ee80dce39ac9.file.list_footer.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/helpers/list/list_footer.tpl',
      1 => 1392069215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2005558990531ea46148bed3-18783985',
=======
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/helpers/list/list_footer.tpl',
      1 => 1394483160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1914745915346bb978ebae5-55171294',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/db/0f/08/db0f08a48ab3c38d3cce0dbe92f2cd97c7d1cacf.file.list_footer.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bulk_actions' => 0,
    'key' => 0,
    'table' => 0,
    'params' => 0,
    'simple_header' => 0,
    'token' => 0,
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/0a/f9/dc/0af9dc94d486dc4cb12916bfa901ee80dce39ac9.file.list_footer.tpl.php
  'unifunc' => 'content_531ea4614d0056_41595162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea4614d0056_41595162')) {function content_531ea4614d0056_41595162($_smarty_tpl) {?>
=======
  'unifunc' => 'content_5346bb979b2416_91481006',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346bb979b2416_91481006')) {function content_5346bb979b2416_91481006($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/db/0f/08/db0f08a48ab3c38d3cce0dbe92f2cd97c7d1cacf.file.list_footer.tpl.php

			</table>
			<?php if ($_smarty_tpl->tpl_vars['bulk_actions']->value){?>
				<p>
					<?php  $_smarty_tpl->tpl_vars['params'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['params']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['bulk_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['params']->key => $_smarty_tpl->tpl_vars['params']->value){
$_smarty_tpl->tpl_vars['params']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['params']->key;
?>
						<input type="submit" class="button" name="submitBulk<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['params']->value['text'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['params']->value['confirm'])){?>onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['params']->value['confirm'];?>
');"<?php }?> />
					<?php } ?>
				</p>
			<?php }?>
		</td>
	</tr>
</table>
<?php if (!$_smarty_tpl->tpl_vars['simple_header']->value){?>
	<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
	</form>
<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminListAfter'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)){?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
ListAfter<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }elseif(isset($_GET['controller'])){?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
ListAfter<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>


<?php }} ?>
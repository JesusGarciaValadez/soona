<<<<<<< HEAD:cache/smarty/compile/55/3b/ad/553baddc9659b0414f7c573f2d3c597c642e50ad.file.optimizationTips.tpl.php
<?php /* Smarty version Smarty-3.1.14, created on 2014-03-10 23:50:28
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/controllers/home/optimizationTips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1550358784531ea424b3dcf0-08514002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.14, created on 2014-04-10 10:42:34
         compiled from "/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/controllers/home/optimizationTips.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6854332725346bbea850ec5-22589090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/b6/34/0c/b6340c5ff991a45cc1d954a6f7af12cd974ec806.file.optimizationTips.tpl.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6340c5ff991a45cc1d954a6f7af12cd974ec806' => 
    array (
<<<<<<< HEAD:cache/smarty/compile/55/3b/ad/553baddc9659b0414f7c573f2d3c597c642e50ad.file.optimizationTips.tpl.php
      0 => '/Applications/XAMPP/xamppfiles/htdocs/soona/admin0882/themes/default/template/controllers/home/optimizationTips.tpl',
      1 => 1392069215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1550358784531ea424b3dcf0-08514002',
=======
      0 => '/Applications/MAMP/htdocs/soona/admin0882/themes/default/template/controllers/home/optimizationTips.tpl',
      1 => 1394483040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6854332725346bbea850ec5-22589090',
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/b6/34/0c/b6340c5ff991a45cc1d954a6f7af12cd974ec806.file.optimizationTips.tpl.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hide_tips' => 0,
    'opti_list' => 0,
    'i' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
<<<<<<< HEAD:cache/smarty/compile/55/3b/ad/553baddc9659b0414f7c573f2d3c597c642e50ad.file.optimizationTips.tpl.php
  'unifunc' => 'content_531ea424c32783_18515195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531ea424c32783_18515195')) {function content_531ea424c32783_18515195($_smarty_tpl) {?>
=======
  'unifunc' => 'content_5346bbea9bf327_27608653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5346bbea9bf327_27608653')) {function content_5346bbea9bf327_27608653($_smarty_tpl) {?>
>>>>>>> 130ed9e65ece62706ded259214722de5b60bc19d:cache/smarty/compile/b6/34/0c/b6340c5ff991a45cc1d954a6f7af12cd974ec806.file.optimizationTips.tpl.php
<div class="admin-box1">
<h5><?php echo smartyTranslate(array('s'=>'Configuration checklist'),$_smarty_tpl);?>

	<span style="float:right">
	<a id="optimizationTipsFold" href="#">
		<img alt="v" src="../img/admin/<?php if ($_smarty_tpl->tpl_vars['hide_tips']->value){?>arrow-down.png<?php }else{ ?>arrow-up.png<?php }?>" />
	</a>
	</span>
</h5>
			<ul id="list-optimization-tips" class="admin-home-box-list" <?php if ($_smarty_tpl->tpl_vars['hide_tips']->value){?>style="display:none"<?php }?> >
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['opti_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
				<li>
				<img src="../img/admin/<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
" class="pico" />
					<a  style="color:<?php echo $_smarty_tpl->tpl_vars['i']->value['color'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['i']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a>
				</li>

			<?php } ?>
			</ul>

</div>

<script type="text/javascript">
$(document).ready(function(){
	<?php if (!$_smarty_tpl->tpl_vars['hide_tips']->value){?>
		$("#optimizationTipsFold").click(function(e){
			e.preventDefault();
			$.ajax({
						url: "ajax-tab.php",
						type: "POST",
						data:{
							token: "<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
",
							ajax: "1",
							controller : "AdminHome",
							action: "hideOptimizationTips"
						},
						dataType: "json",
						success: function(json){
							if(json.result == "ok")
								showSuccessMessage(json.msg);
							else
								showErrorMessage(json.msg);

						} ,
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{

						}
					});

		});
	<?php }?>
	$("#optimizationTipsFold").click(function(e){
		e.preventDefault();
		$("#list-optimization-tips").toggle(function(){
			if($("#optimizationTipsFold").children("img").attr("src") == "../img/admin/arrow-up.png")
				$("#optimizationTipsFold").children("img").attr("src","../img/admin/arrow-down.png");
			else
				$("#optimizationTipsFold").children("img").attr("src","../img/admin/arrow-up.png");
		});
	})
});
</script>
<?php }} ?>